<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasil;
use App\Kegiatan;
use App\Kualitas;
use App\Perilaku;
use App\DataPegawai;
use Auth;
use PDF;

class HasilController extends Controller
{
    public function index()
    {
        $data['periode'] = json_decode(request()->cookie('ekin-periode'));
        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
        $periode = json_decode(request()->cookie('ekin-periode'));


        if(!isset($periode)){
            return redirect(route('dashboard'))->with(['failed' => 'Silahkan pilih periode terlebih dahulu']);
        }

        // $year = date('Y');
        // $month = date('m',strtotime("-1 month"));
        $bulan = new Hasil();
        $data['all'] = Hasil::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['kualitas'] = Kualitas::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['perilaku'] = Perilaku::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['kegiatan'] = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->where('tugas', 'Like', '%tambah%')->get();

        return view('hasil.index', $data);
    }
    public function printPDF(){
        $data['periode'] = json_decode(request()->cookie('ekin-periode'));
        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
        $periode = json_decode(request()->cookie('ekin-periode'));

        $data['all'] = Hasil::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['kualitas'] = Kualitas::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['perilaku'] = Perilaku::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['kegiatan'] = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->where('tugas', 'Like', '%tambah%')->get();

        return view('hasil.print', $data);
    }

    public function pdf()
    {
        $data['periode'] = json_decode(request()->cookie('ekin-periode'));
        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
        $periode = json_decode(request()->cookie('ekin-periode'));

        $data['all'] = Hasil::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['kualitas'] = Kualitas::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['perilaku'] = Perilaku::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->get();
        $data['kegiatan'] = Kegiatan::where('bulan', $periode->bulan)->where('tahun', $periode->tahun)->where('nama',$pegawai->nama)->where('tugas', 'Like', '%tambah%')->get();




        $pdf = PDF::loadView('hasil.pdf', ['all' => $data['all'], 'kualitas' => $data['kualitas'], 'perilaku' => $data['perilaku'], 'kegiatan' => $data['kegiatan']]);

        return $pdf->stream();
    }
}
