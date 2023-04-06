<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Target;
use App\DataPegawai;
use Auth;
use App\Indikator;

class TargetController extends Controller
{
    public function index()
    {
       
        $data['periode'] = json_decode(request()->cookie('ekin-periode'));
        $periode = json_decode(request()->cookie('ekin-periode'));

        if(!isset($periode)){
            return redirect(route('dashboard'))->with(['failed' => 'Silahkan pilih periode terlebih dahulu']);
        }

        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();

        $data['all'] = Target::where('bulan',$periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['atasan1'] = $pegawai->atasan1;
        $data['atasan2'] = $pegawai->atasan2;

        $data['indikator'] = Indikator::where('instalasi',$pegawai->instalasi)->get();
        return view('target.index', $data);
    }

    public function create()
    {
        return view('target.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'instalasi' => 'required',
            'bulan' => 'required',
            'tugas' => 'required',
            'target' => 'required',
            'persentase' => 'required'
        ]);

   
        $target = Target::create([
            'nama' => $request->nama,
            'instalasi' => $request->instalasi,
            'bulan' => $request->bulan,
            'tugas' => $request->tugas,
            'target' => $rquest->target, 
            'persentase' => $request->persentase
        ]);
        return redirect(route('target'))->with(['success' => 'Target Baru Ditambahkan']);
    
    }

    public function edit(Request $request)
    {
        $nama = $request->get('nama');
        $bulan= $request->get('bulan');
        $tugas = $request->get('tugas');
        $target = Target::where('nama',$nama)->where('bulan',$bulan)->where('tugas',$tugas)->first();
        return view('target.edit', compact('target'));
    }

    public function update(Request $request, $id)
    {
        $nama = $request->get('nama');
        $bulan= $request->get('bulan');
        $tugas = $request->get('tugas');
        $this->validate($request, [
            'nama' => 'required',
            'instalasi' => 'required',
            'bulan' => 'required',
            'tugas' => 'required',
            'target' => 'required',
            'persentase' => 'required'
        ]);

        $target = Target::where('nama',$nama)->where('bulan',$bulan)->where('tugas',$tugas)->first();

        $target->update([
            'nama' => $request->nama,
            'instalasi' => $request->instalasi,
            'bulan' => $request->bulan,
            'tugas' => $request->tugas,
            'target' => $rquest->target, 
            'persentase' => $request->persentase
        ]);
        return redirect(route('target'))->with(['success' => 'Data Target Diperbaharui']);
    }

    public function destroy(Request $request)
    {
        $nama = $request->get('nama');
        $bulan= $request->get('bulan');
        $tugas = $request->get('tugas');


        $target = Target::where('nama',$nama)->where('bulan',$bulan)->where('tugas',$tugas)->first();
        $product->delete();
        return redirect(route('target'))->with(['success' => 'Target Sudah Dihapus']);
    }

   
}
