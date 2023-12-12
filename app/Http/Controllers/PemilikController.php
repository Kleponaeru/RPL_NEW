<?php

namespace App\Http\Controllers;

use App\Charts\charCoba;
use App\Models\PemilikSampah;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade as PDF;

class PemilikController extends Controller
{


    public function Pemilik()
    {
        $orders = PemilikSampah::orderBy('id', 'desc')->paginate(15);
        return view('dashboard_pemilik', ['orders' => $orders]);
    }
    public function luaran(charCoba $chart)
    {
        $orders = Riwayat::orderBy('id', 'desc')->paginate(15);
        return view('luaran_pemilik', ['orders' => $orders], ['chart' => $chart->build()]);
    }

    public function formPesanan()
    {
        return view('pesanan_pemilik');
    }
    public function postPesanan(Request $request)
    {
        PemilikSampah::create([
            'id_location' => $request-> id_location,
            'kg_sampah'=>$request->kg_sampah,
            'jam'=>$request->jam,
            'status' =>$request->status,
            'jns_smph' =>$request->jns_smph,
            'pengambilan' =>$request->pengambilan,
            'harga' =>$request->harga,
        ]);
        return redirect("/dashboard/pemilik")->with('flash_added', 'Data Successfully Added');
    }
    // public function profilepengambil()
    // {
    //     $username = Auth::User()->username ?? '';
    //     $user = Auth::User()->username ?? '';
    //     $result = User::where('username', $username)->first();
    //     return view('profile_pemilik', ['result' => $result, 'user'=>$user]);
    // }

    public function delete($id)
    {
        $n = PemilikSampah::find($id);
        $n->delete();
        return redirect("/dashboard/pemilik")->with('flash_deleted', 'Data Successfully Deleted');
    }

    public function update($id,Request $request)
    {
        $n = PemilikSampah::find($id);
        $n->id_location = $request->id_location;
        $n->kg_sampah = $request->kg_sampah;
        $n->jam = $request->jam;
        $n->status = $request->status;
        $n->jns_smph = $request->jns_smph;
        $n->harga = $request->harga;
        $n -> save();

        return redirect("/dashboard/pemilik")->with('flash_edited', 'Data Successfully Edited');
    }

    public function formedit($id)
    {
        $n = PemilikSampah::find($id);
        return view('editpesanan_pemilik', ['n'=>$n]);
    }

    public function profilepemilik(){
        // $n = User::find($id_user);
        return view('profile_pemilik');
    }

    public function generatePDF()
    {
        $data = Riwayat::all();
        // $pdf = PDF::loadView('pdf.view', compact('data'));
        $pdf = App::make('dompdf.wrapper');
        $sum = $data->sum('harga');
        $pdf->loadView('pdf', compact('data', 'sum'));

        return $pdf->download('Luna-Invoice.pdf');
    }

    public function PDFperrow($id)
    {
        $data = Riwayat::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdfbyid', compact('data'));

        return $pdf->download('Luna-Invoice.pdf', ['data'=>$data]);
    }

}
