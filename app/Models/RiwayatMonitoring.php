<?php

namespace App\Models;

// use App\Models\Penyiraman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatMonitoring extends Model
{
    use HasFactory;
    protected $table = 'riwayat_monitoring';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $casts = [
        'tanggal_monitoring' => 'datetime',
    ];
    public function penyiraman()
    {
        return $this->belongsTo(Penyiraman::class);
    }
    
}
