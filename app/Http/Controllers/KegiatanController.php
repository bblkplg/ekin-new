<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\DataPegawai;
use App\Target;
use Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        $data['periode'] = json_decode(request()->cookie('ekin-periode'));
        $periode = json_decode(request()->cookie('ekin-periode'));



        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
        $data['target'] = Target::where('nama',$pegawai->nama)->get();

        $data['all'] = Kegiatan::where('tahun','2023')->where('nama',$pegawai->nama)->orderBy('tanggal','ASC')->get();
        $data['atasan1'] = $pegawai->atasan1;
        $data['atasan2'] = $pegawai->atasan2;
        return view('kegiatan.index', $data);
    }

    public function create(){

        return view ('kegiatan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'bulan' => 'required',
            'tanggal' => 'required',
            'tugas' => 'required',
            'uraian' => 'required',
            'mulai' => 'required',
            'tahun' => 'required',
        ]);


        $target = Kegiatan::create($request->all());

        return redirect()->back()->with(['success' => __('Data berhasil di tambah')]);
    }
}
