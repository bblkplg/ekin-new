<?php

namespace App\Http\Controllers;

use App\DataPegawai;
use App\Kualitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KualitasController extends Controller
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
        $data['kualitas'] = Kualitas::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama', $pegawai)->get();

        $patokan_bulan = 'Januari';
        $patokan_tahun = '2023';

        $data['filterqly'] = Kualitas::where('bulan', $patokan_bulan)->where('tahun', $patokan_tahun)->where('nama', $pegawai)->distinct()->get();


        return view('kualitas.index', $data);
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
    public function update(Request $request, Kualitas $kualitas)
    {
        $kualitas = Kualitas::where('id_kualitas', request()->id_kualitas)->first();
        $pegawai = (request()->nama);
        $periode = json_decode(request()->cookie('ekin-periode'));

        $hasil  = (($request->bobot / $request->target) *$request->capaian);

        $kualitas->update([
            'nama' => $pegawai,
            'bulan' => $periode->bulan,
            'tahun' => $periode->tahun,
            'indikator' => $request->indikator,
            'definisi' => $request->definisi,
            'target' => $request->target,
            'bobot' => $request->bobot,
            'capaian' => $request->capaian,
            'instalasi' => $request->instalasi,
            'hasil' => $hasil,

        ]);


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
