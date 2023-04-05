<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\DataPegawai;
use Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        $month = date('m',strtotime("-1 month"));
        $bulan = new Kegiatan();
        $b = $bulan->bulan($month);

        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();

        $year = date('Y');
        $data['all'] = Kegiatan::where('bulan',$bulan->bulan($month))->where('tahun',$year)->where('nama',$pegawai->nama)->orderBy('tanggal','ASC')->get();
        return view('kegiatan.index', $data);
    }

    public function create(){

        return view ('kegiatan.create');
    }

    public function store(Request $request, Indicator $indicator)
    {
        $this->validate($request, [
            'nama' => 'required',
            'instalasi' => 'required',
            'bulan' => 'required',
            'tugas' => 'required',
            'target' => 'required',
            'persentase' => 'required'
        ]);

        $target = Kegiatan::create($request->all());

        return redirect()->back()->with(['success' => __('Data berhasil di tambah')]);
    }
}
