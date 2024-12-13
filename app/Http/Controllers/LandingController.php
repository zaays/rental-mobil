<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //

    public function index()
    {
        $mobil = Car::all();
        return view('frontend.landing', [
            'mobil' => $mobil
        ]);
    }

    public function detail($no_polisi)
    {
        $mobil = Car::where('no_polisi', $no_polisi)->first();
        return view(
            'frontend.detail',
            [
                'mobil' => $mobil
            ]
        );
    }
}
