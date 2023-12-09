<?php

namespace App\Http\Controllers;

use App\Models\PengambilSampah;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Models\PemilikSampah;
use App\Charts\chartPengambil;

class PengambilController extends Controller
{
    public function Pengambil()
    {
        $orders = PemilikSampah::orderBy('id', 'desc')->paginate(15);
        $orders_pengambil = PemilikSampah::orderBy('id', 'desc')->paginate(15);
        return view('dashboard_pengambil', ['orders' => $orders], ['orders_pengambil' => $orders_pengambil]);
    }
    public function luaran(chartPengambil $chart)
    {
        $orders = Riwayat::orderBy('id', 'desc')->paginate(15);
        return view('luaran_pengambil', ['orders' => $orders],['chart' => $chart->build()]);
    }
    public function formPesanan()
    {
        return view('pesanan_pengambil');
    }
    public function postPesanan(Request $request)
    {
        PengambilSampah::create([
            'kg_sampah'=>$request->kg_sampah,
            'jam'=>$request->jam,
            'status' =>$request->status,
            'jns_smph' =>$request->jns_smph,
        ]);
        return redirect("/dashboard/pengambil")->with('flash_added', 'Data Successfully Added');;
    }
    public function delete($id)
    {
        $n = PengambilSampah::find($id);
        $n->delete();
        return redirect("/dashboard/pengambil")->with('flash_deleted', 'Data Successfully Deleted');
    }

    public function update($id,Request $request)
    {
        $n = PengambilSampah::find($id);
        $n->kg_sampah = $request->kg_sampah;
        $n->jam = $request->jam;
        $n->status = $request->status;
        $n->jns_smph = $request->jns_smph;
        $n -> save();

        return redirect("/dashboard/pengambil")->with('flash_edited', 'Data Successfully Edited');
    }

    public function formedit($id)
    {
        $n = PengambilSampah::find($id);
        return view('editpesanan_pengambil', ['n'=>$n]);
    }
    public function updatestatus($id, Request $request)
    {
        $statusValue = $request->input('pengambilan');

        // Update your model or database table with the new status value
        PemilikSampah::where('id', $id)->update(['pengambilan' => $statusValue]);

        return redirect('/dashboard/pengambil')->with('flash_status', 'Status Successfully Updated');
    }
}
