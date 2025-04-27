<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanduanWebsiteController extends Controller
{
    public function index()
    {
        return view('panduan.index');
    }
}
