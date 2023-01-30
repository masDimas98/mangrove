<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenanamanModel as Penanaman;

class HomeController extends Controller
{
    public function beranda()
    {
        return view('guest/beranda');
    }

    public function Galeri()
    {
        $data = Penanaman::orderBy('tgltanam', 'desc')->limit(6)->get(['foto']);
        // Penanaman
        return view('guest/galeri', ['data' => $data]);
    }
}
