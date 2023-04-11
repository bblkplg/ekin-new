<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataPegawai;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Cookie;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        $data['datapegawai'] = DataPegawai::all();
        return view('login', $data);
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'password' => 'required|string'
        ]);


        $user = DataPegawai::where('nama', request()->nama)->where('password', request()->password)->first();
        if($user) {
            Auth::login($user);

            return redirect(route('dashboard'));
        }

        return redirect()->back()->with(['loginError' => 'Nama / Password Salah']);
    }

    public function dashboard()
    {
        $data['periode'] = json_decode(request()->cookie('ekin-periode'));

        return view('administrator.index');
    }

    public function logout()
    {
        $cookie = Cookie::forget('ekin-periode');
        Cookie::queue(Cookie::forget('ekin-periode'));
        auth()->logout();
        return redirect(route('login'));
    }

    public function periode(Request $request)
    {
        $this->validate($request, [
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        $periode = json_decode($request->cookie('ekin-periode'), true);

        $periode = [
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ];

        $cookie = cookie('ekin-periode', json_encode($periode), 2880);
        return redirect()->back()->cookie($cookie);
    }

    private function getPeriode()
    {
        $periode = json_decode(request()->cookie('ekin-periode'), true);
        $periode = $periode != '' ? $periode:[];
        return $periode;
    }

    public function listPeriode()
    {
        $periode = $this->getPeriode();

        return view('administrator.index', compact('periode'));
    }

}
