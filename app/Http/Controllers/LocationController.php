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
}
