<?php

namespace App\Http\Controllers;

use App\DataPegawai;
use App\Hasil;
use App\Kegiatan;
use App\Kualitas;
use App\Perilaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $data['periode'] = json_decode(request()->cookie('ekin-periode'));
            $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
            $periode = json_decode(request()->cookie('ekin-periode'));

            if(!isset($periode)){
                return redirect(route('dashboard'))->with(['failed' => 'Silahkan pilih periode terlebih dahulu']);
            }

            $data['perilaku'] = Perilaku::join('datapegawai','datapegawai.nama', '=','perilaku.nama')->where('perilaku.bulan', $periode->bulan)->where('perilaku.tahun', $periode->tahun)->where('datapegawai.atasan1', $pegawai->nama)->get();
            $data['kualitas'] = Kualitas::select('kualitas.nama as nama', DB::raw('Sum(kualitas.hasil) as total_kualitas'))->where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('datapegawai.atasan1', $pegawai->nama)->join('datapegawai','datapegawai.nama', '=','kualitas.nama')->where('datapegawai.atasan1', $pegawai->nama)->groupBy('kualitas.nama')->get();

        return view('validasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hasil(){
        $data['periode'] = json_decode(request()->cookie('ekin-periode'));
        $pegawai = (request()->nama);
        $periode = json_decode(request()->cookie('ekin-periode'));

        $data['pegawai'] = (request()->nama);

        $data['all'] = Hasil::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama', $pegawai)->get();
        $data['perilaku'] = Perilaku::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai)->get();
        $data['kualitas'] = Kualitas::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai)->get();
        $data['kegiatan'] = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai)->where('tugas', 'Like', '%tambah%')->get();
        $data['perilakuhasil'] = Perilaku::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai)->first();

        return view('validasi.hasil', $data);
    }

    public function perilakuedit(){

        $data['periode'] = json_decode(request()->cookie('ekin-periode'));
        $periode = json_decode(request()->cookie('ekin-periode'));
        $pegawai = (request()->nama);


        $data['perilaku'] = Perilaku::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai)->first();


        return view('validasi.hasil', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
