<?php

namespace App\Http\Controllers;

use App\Models\PemilikSampah;
use App\Models\PengambilSampah;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function Bank()
    {
        $orders = PemilikSampah::orderBy('id', 'desc')->paginate(15);
        return view('dashboard_bank', ['orders' => $orders]);
    }
    public function updatestatusBank($id, Request $request)
    {
        $statusValue = $request->input('status');

        // Update your model or database table with the new status value
        PemilikSampah::where('id', $id)->update(['status' => $statusValue]);

        return redirect('/dashboard/bank')->with('flash_status', 'Status Successfully Updated');
    }
}
