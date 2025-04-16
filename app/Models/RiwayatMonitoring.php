<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMonitoring extends Model
{
    use HasFactory;
    protected $table = 'monitoring_datas';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $casts = [
        'tanggal_monitoring' => 'datetime',
    ];
    
}
