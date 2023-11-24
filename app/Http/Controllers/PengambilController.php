<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikSampah;

class PengambilController extends Controller
{
    public function Pengambil()
    {
        $orders = PemilikSampah::orderBy('id', 'desc')->paginate(5);
        return view('dashboard_pengambil', ['orders' => $orders]);
    }
}
