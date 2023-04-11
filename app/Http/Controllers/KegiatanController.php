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

        if(!isset($periode)){
            return redirect(route('dashboard'))->with(['failed' => 'Silahkan pilih periode terlebih dahulu']);
        }
        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
        $data['target'] =  Target::where('nama', $pegawai->nama)->where('bulan', $periode->tahun)->get();

        $data['all'] = Kegiatan::where('tahun',$periode->tahun)->where('nama', $pegawai->nama)->where('bulan', $periode->bulan)->orderBy('tanggal','ASC')->get();
        $data['validasi'] = Kegiatan::where('tahun',$periode->tahun)->where('nama', $pegawai->nama)->where('bulan', $periode->bulan)->get();
        $data['atasan1'] = $pegawai->atasan1;
        $data['atasan2'] = $pegawai->atasan2;
        return view('kegiatan.index', $data);
    }

    public function create(){

        return view ('kegiatan.create');
    }

    public function store(Request $request, Kegiatan $kegiatan)
    {
        $periode = json_decode(request()->cookie('ekin-periode'));
        // $this->validate($request, [
        //     'nama'    => 'required',
        //     'bulan'   => 'required',
        //     'tanggal' => 'required',
        //     'tugas'   => 'required',
        //     'uraian'  => 'required',
        //     'mulai'   => 'required',
        //     'tahun'   => 'required'
        // ]);
        $pegawai = DataPegawai::where('api_id', Auth::user()->api_id)->first();


       $kegiatan->create([
                'nama' =>  $pegawai->nama,
                'tanggal' => $request->tanggal,
                'bulan' => $periode->bulan,
                'tahun' => $periode->tahun,
                'tugas' => $request->tugas,
                'uraian' => $request->uraian,
                'mulai' => $request->mulai,
                'noorder' => $request->noorder,
                'kepala_instalasi' => 'Belum Disetujui',

            ]);



        return redirect()->back()->with(['success' => __('Data berhasil di tambah')]);
    }


    public function edit(Kegiatan $kegiatan)
    {

        // $kegiatan = Kegiatan::where('IdCatKegiatan', $idkegiatan)->where('uraian', $uraian)->first();

        return view('kegiatan.edit', compact('kegiatan'));
    }



    public function update(Request $request, Kegiatan $kegiatan)
    {

        $this->validate($request, [
            'nama'    => 'required',
            'bulan'   => 'required',
            'tanggal' => 'required',
            'tugas'   => 'required',
            'uraian'  => 'required',
            'tahun'   => 'required'
        ]);


        $kegiatan->update([
            'nama' => $request->nama,
            'bulan' => $request->bulan,
            'tanggal' => $request->tanggal,
            'tugas' => $request->tugas,
            'uraian' => $request->uraian,
            'tahun' => $request->tahun
        ]);

        return redirect(route('kegiatan.store'))->with(['success' => 'Data Target Diperbaharui']);
    }

    public function destroy(Kegiatan $kegiatan)
    {
        // $nama = $request->get('nama');
        // $bulan= $request->get('bulan');

        $kegiatan->delete();
        // $target = Target::where('nama',$nama)->where('bulan',$bulan)->where('tugas',$tugas)->first();
        // $target->delete();
        return redirect()->back()->with(['success' => __('Data berhasil di hapus')]);
    }
}
