<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index()
    {
        // Get all locations from the locations table
        $locations = DB::table('locations')->get();
        // Send all locations to the view named maps
        return view('maps', ['locations' => $locations]);
    }

    public function getPesananPemilikView()
    {
        $locations = DB::table('locations')->get();

        return view('pesanan_pemilik', ['locations' => $locations]);
    }

    public function mapsPengambil()
    {
        // Get all locations from the locations table
        $locations = DB::table('locations')->get();
        // Send all locations to the view named maps
        return view('maps_pengambil', ['locations' => $locations]);
    }
}
