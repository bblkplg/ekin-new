<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasil;
use App\DataPegawai;
use Auth;

class HasilController extends Controller
{
    public function index()
    {
        $month = date('m',strtotime("-1 month"));
        $bulan = new Hasil();
        $b = $bulan->bulan($month);

        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();

        $year = date('Y');
        $data['all'] = Hasil::where('bulan',$bulan->bulan($month))->where('tahun',$year)->where('nama',$pegawai->nama)->get();
        return view('hasil.index', $data);
    }
}
