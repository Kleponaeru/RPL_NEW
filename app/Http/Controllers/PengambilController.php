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

    public function updatestatus($id, Request $request)
    {
        $statusValue = $request->input('status');

        // Update your model or database table with the new status value
        PemilikSampah::where('id', $id)->update(['status' => $statusValue]);

        return redirect('/dashboard/pengambil');
    }
}
