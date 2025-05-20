<?php

namespace App\Http\Controllers;

use App\Models\Penyiraman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PenyiramanController extends Controller
{
    public function index()
    {
        return view('penyiraman.index');
    }

    public function penyiramanManual()
    {
        $suhu = Cache::get('suhu');
        $kelembaban_tanah = Cache::get('kelembaban_tanah');
        $mode = 'manual';
        $tanggal = Carbon::now();

        $penyiraman = Penyiraman::create([
            'mode' => $mode,
            'created_at' => $tanggal
        ]);
        $penyiraman->riwayatMonitorings()->create([
            'suhu' => $suhu,
            'kelembapan_tanah' => $kelembaban_tanah,
            'tanggal_monitoring' => $tanggal
        ]);
    
        // return response()->json(['message' => 'Penyiraman manual berhasil disimpan.']);
    }
}
