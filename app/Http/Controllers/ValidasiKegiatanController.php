<?php

namespace App\Http\Controllers;

use App\DataPegawai;
use App\Kegiatan;
use App\Kualitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidasiKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['periode'] = json_decode(request()->cookie('ekin-periode'));

        $pegawai = (request()->nama);

        $periode = json_decode(request()->cookie('ekin-periode'));

        $data['pegawai'] = DataPegawai::where('nama',$pegawai)->first();

        $data['all'] = Kegiatan::select('kegiatan.nama','kegiatan.bulan','kegiatan.tahun' )->where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->join('datapegawai','datapegawai.nama', '=','kegiatan.nama')->where('datapegawai.atasan1', Auth::user()->nama)->groupBy('kegiatan.bulan','kegiatan.nama','kegiatan.tahun')->get();

        return view('validasikegiatan.index', $data);
    }

    public function kegiatan(Kegiatan $kegiatan)
    {

        $periode = json_decode(request()->cookie('ekin-periode'));

        $pegawaireq = (request()->nama);

        $pegawai = DataPegawai::where('nama', $pegawaireq)->first();

        $periode = json_decode(request()->cookie('ekin-periode'));

        $editkeg = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->first();
        // $data['all'] = Kegiatan::select('kegiatan.nama','kegiatan.bulan','kegiatan.tahun','kegiatan.tugas','kegiatan.uraian' )->where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->join('datapegawai','datapegawai.nama', '=','kegiatan.nama')->where('kegiatan.nama',$pegawai)->groupBy('kegiatan.bulan','kegiatan.nama','kegiatan.tahun','kegiatan.tugas','kegiatan.uraian')->get();
        $all = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();


        return view('validasikegiatan.kegiatan',  compact('periode','pegawai','all','kegiatan','editkeg'));
    }


    public function getakun(){

        $patokan_bulan = 'Januari';
        $patokan_tahun = '2023';

        $pegawai = DataPegawai::where('api_id', request()->nama)->first();


        $filterqly = Kualitas::where('bulan', $patokan_bulan)->where('tahun', $patokan_tahun)->distinct()->get();

        return response()->json($filterqly);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periode = json_decode(request()->cookie('ekin-periode'));
        $pegawai =(request()->nama);

        // $this->validate($request, [
        //     'nama'    => 'required',
        //     'bulan'   => 'required',
        //     'tanggal' => 'required',
        //     'tugas'   => 'required',
        //     'uraian'  => 'required',
        //     'mulai'   => 'required',
        //     'tahun'   => 'required'
        // ]);

          $hasil  = (($request->bobot / $request->target) *$request->capaian);

        $kualitas = Kualitas::create([
            'nama' => $pegawai,
            'bulan' => $periode->bulan,
            'tahun' => $periode->tahun,
            'indikator' => $request->indikator,
            'definisi' => $request->definisi,
            'target' => $request->target,
            'bobot' => $request->bobot,
            'capaian' => $request->capaian,
            'hasil' => $hasil,
        ]);

        return redirect()->back()->with(['success' => 'Target Baru Ditambahkan']);
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
    public function edit()
    {

        $data['periode'] = json_decode(request()->cookie('ekin-periode'));
        $periode = json_decode(request()->cookie('ekin-periode'));
        $pegawai = (request()->nama);

        $data['kualitas'] = Kualitas::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('id_kualitas', request()->id_kualitas)->first();


        return view('kualitas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $kegiatan = Kegiatan::where('IdCatKegiatan', request()->IdCatKegiatan)->first();
        $pegawai = (request()->nama);
        $periode = json_decode(request()->cookie('ekin-periode'));

        $kegiatan->update([
            'kepala_instalasi' => $request->kepala_instalasi,
            'catatan' => $request->catatan,
        ]);


        return redirect()->back()->with(['success' => 'Data Indikator Diperbaharui']);
    }

    public function verifall(Request $request)
    {
        $pegawai = (request()->nama);
        $periode = json_decode(request()->cookie('ekin-periode'));
        $kegiatan = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama', $pegawai)->get();

        foreach ($kegiatan as $data){
        if($data->kepala_instalasi == "Belum Disetujui"){
            $cari = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama', $pegawai)->where('kepala_instalasi', "Belum Disetujui")->get();

            foreach ($cari as $cari){
            $cari->update([
                    'kepala_instalasi' => $request->kepala_instalasi,
                ]);
            }

        }elseif($data->kepala_instalasi == "Telah Disetujui"){
                $cari = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama', $pegawai)->where('kepala_instalasi', "Telah Disetujui")->get();

                foreach ($cari as $cari){
                $cari->update([
                        'kepala_instalasi' => $request->kepala_instalasi,
                    ]);
                }
        }else{
            //back
        }
    }


        return redirect()->back()->with(['success' => 'Data Indikator Diperbaharui']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kualitas $kualitas)
    {
        $kualitas = Kualitas::where('id_kualitas', request()->id_kualitas)->first();

        if ($kualitas != null) {
        $kualitas->delete();
        }
        return redirect()->back()->with(['success' => 'Target Sudah Dihapus']);
    }
}
