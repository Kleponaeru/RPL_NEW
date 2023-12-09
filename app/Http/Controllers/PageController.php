<?php

namespace App\Http\Controllers;

use App\Charts\charCoba;
use App\Models\PemilikSampah;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Models\User;

class PageController extends Controller
{
    public function home()
    {
        return view("home");
    }
    // public function grafik()
    // {
    //     $orders = PemilikSampah::orderBy('id', 'desc')->paginate(15);
    //     return view('charCoba', ['orders' => $orders]);
    // }
    public function chart(charCoba $chart){
        return view("chart",[
            'chart' => $chart->build()
        ]);
    }


    public function register()
    {
        return view("register");
    }
    public function post_register(Request $request)
    {
        User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
        ]);
        return redirect("/login");
    }
    public function dashboardPengambil()
    {
        return view("dashboard_pengambil");
    }

    public function dashboardPemilik()
    {
        return view("dashboard_pemilik");
    }

    public function dashboardBank()
    {
        return view("dashboard_bank");
    }

}
