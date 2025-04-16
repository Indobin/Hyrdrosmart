<?php

namespace App\Http\Controllers;

use App\Models\RiwayatMonitoring;
use Illuminate\Http\Request;

class RiwayatMController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatMonitoring::latest('tanggal_monitoring')->get();
        return view('riwayatmonitoring.index', compact('riwayat'));
    }
}
