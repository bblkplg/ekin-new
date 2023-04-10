<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indikator;
use App\DataPegawai;
use Auth;
use DB;

class IndikatorController extends Controller
{
    public function index()
    {
        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
        $data['instalasi'] = $pegawai->instalasi;
        $data['all'] = Indikator::all();

        $data['ins'] = Indikator::distinct()->get(['instalasi']);

        return view('indikator.index', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'indikator' => 'required',
            'instalasi' => 'required'
        ]);

<<<<<<< HEAD

        $target = Target::create([
            'nama' => $request->nama,
            'instalasi' => $request->instalasi,
            'bulan' => $request->bulan,
            'tugas' => $request->tugas,
            'target' => $rquest->target,
            'persentase' => $request->persentase
        ]);
        return redirect(route('target'))->with(['success' => 'Target Baru Ditambahkan']);

=======
        $indikator = Indikator::create([
            'indikator' => $request->indikator,
            'instalasi' => $request->instalasi
        ]);
        return redirect(route('indikator.index'))->with(['success' => 'Indikator Baru Ditambahkan']);
>>>>>>> 5534ab9bacddd3107621b30b2c2777e87889a743
    }

    public function edit(Indikator $indikator)
    {
        $indikator = Indikator::find($indikator->idindikator);

        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
        $data['instalasi'] = $pegawai->instalasi;

        $instalasi = Indikator::distinct()->get(['instalasi']);
        return view('indikator.edit',compact('indikator','instalasi'));
    }

    public function update(Request $request, Indikator $indikator)
    {
        $this->validate($request, [
            'indikator' => 'required',
            'instalasi' => 'required'
        ]);

        $indikator = Indikator::where('idindikator',$indikator->idindikator)->first();

<<<<<<< HEAD
        $target->update([
            'nama' => $request->nama,
            'instalasi' => $request->instalasi,
            'bulan' => $request->bulan,
            'tugas' => $request->tugas,
            'target' => $rquest->target,
            'persentase' => $request->persentase
=======
        $indikator->update([
            'indikator' => $request->indikator,
            'instalasi' => $request->instalasi
>>>>>>> 5534ab9bacddd3107621b30b2c2777e87889a743
        ]);
        return redirect(route('indikator.index'))->with(['success' => 'Data Indikator Diperbaharui']);
    }

    public function destroy(Request $request, Indikator $indikator)
    {
        $indikator = Indikator::where('idindikator',$indikator->idindikator)->first();
        $indikator->delete();
        return redirect(route('indikator.index'))->with(['success' => 'Indikator Sudah Dihapus']);
    }

}
