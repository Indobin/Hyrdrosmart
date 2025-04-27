<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyiraman extends Model
{
    protected $table = 'penyiraman';
    protected $guarded = ['id'];
    public function riwayatMonitorings()
    {
        return $this->hasOne(RiwayatMonitoring::class);
    }
}
