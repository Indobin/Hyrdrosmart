<?php

use App\Http\Middleware\ForceHttpsNgrok;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => AuthMiddleware::class
        ]);
        $middleware->append(ForceHttpsNgrok::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withSchedule(function(Schedule $schedule){
        $schedule->command('penyiraman:jadwal')->everyTwentySeconds();
        // $schedule->command('penyiraman:jadwal')->cron('30 06 * * *');
        // $schedule->command('penyiraman:jadwal')->cron('30 16 * * *');
    })
    ->create();
    
