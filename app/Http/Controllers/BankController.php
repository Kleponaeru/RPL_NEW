<?php

namespace App\Http\Controllers;

use App\Models\PengambilSampah;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function Bank()
    {
        $orders_pengambil = PengambilSampah::orderBy('id', 'desc')->paginate(5);
        return view('dashboard_bank', ['orders_pengambil' => $orders_pengambil]);
    }
}
