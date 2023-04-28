<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasil;
use App\Kegiatan;
use App\Kualitas;
use App\Perilaku;
use App\DataPegawai;
use App\Target;
use Auth;
use PDF;
use DB;

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

        $data['query'] =  DB::table('Kegiatan')->join('target','target.tugas','kegiatan.tugas')->select('target.tugas','target','persentase', DB::raw('Sum(kegiatan.mulai) as capaian'))->groupby('target.tugas','target.target','target.persentase')->where('target.bulan', $periode->tahun)->where('target.nama',$pegawai->nama)->where('kegiatan.tahun',$periode->tahun)->where('kegiatan.bulan',$periode->bulan)->where('kegiatan.nama',$pegawai->nama)->get();



        // foreach($data['query'] as $query){
        //     if($query->capaian != 0){
        //         $data['hasil'] += (Round(($query->persentase / $query->target),2) * $query->capaian);
        //     }else{
        //         $data['hasil'] = 0;
        //     }

        // }

        return view('hasil.index', $data);
    }

    // public function hasil(){


    //     $data['periode'] = json_decode(request()->cookie('ekin-periode'));

    //     $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
    //     $periode = json_decode(request()->cookie('ekin-periode'));
    //     $data['query'] =  DB::table('target')->join('kegiatan','kegiatan.tugas','target.tugas')->select('target.tugas','target','persentase', DB::raw('Sum(kegiatan.mulai) as capaian'))->groupby('target.tugas','target.target','target.persentase')->where('target.bulan', $periode->tahun)->where('target.nama',$pegawai->nama)->where('kegiatan.tahun',$periode->tahun)->where('kegiatan.bulan',$periode->bulan)->where('kegiatan.nama',$pegawai->nama)->get();
    //     $data['hasil'] = Hasil::where('tahun',$periode->tahun)->where('bulan',$periode->bulan)->where('nama',$pegawai->nama)->get();

    //     $total = 0;

    //     if($data['hasil'] != NULL){
    //     foreach($data['query'] as $query){


    //             $total = (($query->persentase / $query->target)* $query->capaian);

    //             $hasil =([
    //                 'nama' =>  $pegawai->nama,
    //                 'indikator' => $query->tugas,
    //                 'target' => $query->target,
    //                 'bobot' => $query->persentase,
    //                 'capaian' => $query->capaian,
    //                 'hasil' => number_format($total,2),
    //                 'bulan' => $periode->bulan,
    //                 'tahun' => $periode->tahun,
    //             ]);
    //             print_r($hasil);
    //         }

    //         }else{

    //             // $hasil->update([
    //             //         'nama' =>  $pegawai->nama,
    //             //         'indikator' => $query->tugas,
    //             //         'target' => $query->target,
    //             //         'bobot' => $query->persentase,
    //             //         'capaian' => $query->capaian,
    //             //         'hasil' => number_format($total,2),
    //             //         'bulan' => $periode->bulan,
    //             //         'tahun' => $periode->tahun,
    //             //     ]);
    //             }
    //     }

    public function auto(){
        $data['periode'] = json_decode(request()->cookie('ekin-periode'));

        $pegawai = DataPegawai::where('api_id',Auth::user()->api_id)->first();
        $periode = json_decode(request()->cookie('ekin-periode'));
        $data['query'] =  DB::table('target')->join('kegiatan','kegiatan.tugas','target.tugas')->select('target.tugas','target','persentase', DB::raw('Sum(kegiatan.mulai) as capaian'))->groupby('target.tugas','target.target','target.persentase')->where('target.bulan', $periode->tahun)->where('target.nama',$pegawai->nama)->where('kegiatan.tahun',$periode->tahun)->where('kegiatan.bulan',$periode->bulan)->where('kegiatan.nama',$pegawai->nama)->get();
        $data['hasil'] = Hasil::where('tahun',$periode->tahun)->where('bulan',$periode->bulan)->where('nama',$pegawai->nama)->get();
        $hasil = Hasil::where('tahun',$periode->tahun)->where('bulan',$periode->bulan)->where('nama',$pegawai->nama)->first();
        $hapus = Hasil::where('tahun',$periode->tahun)->where('bulan',$periode->bulan)->where('nama',$pegawai->nama);

        $total = 0;
        if($hasil == null){
            foreach($data['query'] as $query){

                $total = (($query->persentase / $query->target)* $query->capaian);

                Hasil::create([
                    'nama' =>  $pegawai->nama,
                    'indikator' => $query->tugas,
                    'target' => $query->target,
                    'bobot' => $query->persentase,
                    'capaian' => $query->capaian,
                    'hasil' => number_format($total,2),
                    'bulan' => $periode->bulan,
                    'tahun' => $periode->tahun,
                ]);

            }
            return redirect(route('hasil'));

        }else{

            $hapus->delete();

            foreach($data['query'] as $query){
                $total = (($query->persentase / $query->target)* $query->capaian);

                    Hasil::create([
                        'nama' =>  $pegawai->nama,
                        'indikator' => $query->tugas,
                        'target' => $query->target,
                        'bobot' => $query->persentase,
                        'capaian' => $query->capaian,
                        'hasil' => number_format($total,2),
                        'bulan' => $periode->bulan,
                        'tahun' => $periode->tahun,
                    ]);
                }
                return redirect(route('hasil'));

            }
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
