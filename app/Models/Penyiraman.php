<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyiraman extends Model
{
    protected $table = 'penyiraman';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function riwayatMonitorings()
    {
        return $this->hasMany(RiwayatMonitoring::class);
    }
}
