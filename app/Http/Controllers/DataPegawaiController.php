<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPegawai;
use Auth;
use DB;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $data['all'] = DataPegawai::all();
        $data['jabatan'] = DataPegawai::distinct()->get(['jabatan']);
        $data['instalasi'] = DataPegawai::distinct()->get(['instalasi']);
        $data['atasan1'] = DataPegawai::distinct()->get(['atasan1']);
        $data['atasan2'] = DataPegawai::distinct()->get(['atasan2']);
        return view('datapegawai.index', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'password' => 'required',
            'instalasi' => 'required',
            'atasan1' => 'required',
            'atasan2' => 'required',
            'api_id' => 'required',
            'status' => 'required'
        ]);

        $datapegawai = DataPegawai::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'password' => $request->password,
            'instalasi' => $request->instalasi,
            'atasan1' => $request->atasan1,
            'atasan2' => $request->atasan2,
            'api_id' => $request->api_id,
            'status' => $request->status
        ]);
        return redirect(route('datapegawai.index'))->with(['success' => 'data pegawai Baru Ditambahkan']);
    }

    public function edit(DataPegawai $datapegawai)
    {
        $data['datapegawai'] = DataPegawai::find($datapegawai->id);
        $data['jabatan'] = DataPegawai::distinct()->get(['jabatan']);
        $data['instalasi'] = DataPegawai::distinct()->get(['instalasi']);
        $data['atasan1'] = DataPegawai::distinct()->get(['atasan1']);
        $data['atasan2'] = DataPegawai::distinct()->get(['atasan2']);
       
        return view('datapegawai.edit',$data);
    }

    public function update(Request $request, DataPegawai $datapegawai)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'password' => 'required',
            'instalasi' => 'required',
            'atasan1' => 'required',
            'atasan2' => 'required',
            'api_id' => 'required',
            'status' => 'required'
        ]);

        $datapegawai = DataPegawai::where('id',$datapegawai->id)->first();

        $datapegawai->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'password' => $request->password,
            'instalasi' => $request->instalasi,
            'atasan1' => $request->atasan1,
            'atasan2' => $request->atasan2,
            'api_id' => $request->api_id,
            'status' => $request->status
        ]);
        return redirect(route('datapegawai.index'))->with(['success' => 'Data pegawai Diperbaharui']);
    }

    public function destroy(Request $request, DataPegawai $datapegawai)
    {
        $datapegawai = DataPegawai::where('id',$datapegawai->id)->first();
        $datapegawai->delete();
        return redirect(route('datapegawai.index'))->with(['success' => 'datapegawai Sudah Dihapus']);
    }
}
