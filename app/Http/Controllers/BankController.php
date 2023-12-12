<?php

namespace App\Http\Controllers;

use App\Charts\chartPengambil;
use App\Models\PemilikSampah;
use App\Models\PengambilSampah;
use App\Models\Riwayat;
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
    public function profilebank(){
        // $n = User::find($id_user);
        return view('profile_bank');
    }
    public function luaran(chartPengambil $chart)
    {
        $orders = Riwayat::orderBy('id', 'desc')->paginate(15);
        return view('luaran_bank', ['orders' => $orders],['chart' => $chart->build()]);
    }
}
