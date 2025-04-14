<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyiramanController extends Controller
{
    public function index()
    {
        return view('penyiraman.index');
    }
}
