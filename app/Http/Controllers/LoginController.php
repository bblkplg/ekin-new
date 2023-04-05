<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataPegawai;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

        // $nama = request()->nama;
        // $password = request()->password;

        // $auth = $request->only('nama', 'password');
        $user = DataPegawai::where('nama', request()->nama)->where('password', request()->password)->first();
        if($user) {
            Auth::login($user);
            // dd(Auth::user()->nama);
            // return redirect()->intended(route('dashboard'));
            return view('administrator.index');
        }

        
        // if (auth()->guard('pegawai')->attempt(array('nama' => $nama,'password' => $password))) {
           
        //     return redirect()->intended(route('dashboard'));
        // }
        return redirect()->back()->with(['loginError' => 'Nama / Password Salah']);

            // $nama = request()->nama;
            // $password = request()->password;

            // //in my table users, status must be 1 to login into app
            // $matchWhere = ['nama' => $nama, 'password' => $password];

            // $count = DataPegawai::where($matchWhere)->count();

            // if ($count == 1) {
            //     $user = DataPegawai::where($matchWhere)->first();
            //     Auth::loginUsingId($user->api_id);   
            //     return redirect()->intended(route('dashboard'));
            // } else {
            //     //not status active or password or email is wrong
            //     $validator->errors()->add('Unauthorized', 'Not accepted in community yet');
            //     return redirect('/')->withErrors($validator)->withInput();
            // }
    }

    public function dashboard()
    {

        return view('administrator.index');
    }

    public function logout()
    {
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
