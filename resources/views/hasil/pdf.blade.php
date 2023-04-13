<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Cetak Hasil Pegawai</title>

    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

</head>
<style>
    tr,
    th,
    td {
        page-break-inside: avoid !important;
        page-break-after: auto;
    }
    h4{
        font-family: arial, Helvetica, sans-serif;
        font-size: 14px;
        margin: 7;
    }
    p{
        font-family: arial, Helvetica, sans-serif;
        font-size: 14px;
        margin: 5;
    }
    .p-size{
        font-family: arial, Helvetica, sans-serif;
        font-size: 14px;
    }
    .total-size{
        font-family: arial, Helvetica, sans-serif;
        font-size: 18px;
    }
        .center {
    margin-left: auto;
    margin-right: auto;
    }
    #tabel{
    border: 1px solid;
    border-buttom: 1px solid #ddd;
    border-collapse: collapse;
    padding: 8px;
    text-align: left;
    font-family: arial, Helvetica, sans-serif;
    font-size: 14px;

    }

    body.receipt .sheet { width: 58mm; height: 50mm } /* sheet size */
    @media print {  body.receipt { width: 58mm }.pagebreak {
        clear: both;
        page-break-after: always
    } } /* fix for Chrome */
    .solid {border-style: solid;}
</style>

        <body>
              <h4 class="p-size"><center><b>LAPORAN HASIL E-KINERJA PEGAWAI</center></b></h4>
              <h4 class="p-size"><center><b>BALAI BESAR LABORATORIUM KESEHATAN PALEMBANG</center></b></h4>
              <div class="pagebreak">
                <table class="center" >
                    <tbody>
                        <tr>
                            <td width=150px;>
                                <p align='left'> NAMA </p>
                            </td>

                            <td>
                                    <p>&nbsp;: {{ Auth::user()->nama ?? '-' }}</p>

                            </td>
                        </tr>
                        <tr>
                            <td width=150px;>
                                <p align='left'> INST. /SUBBAG/SEKSI </p>
                            </td>


                            <td>
                                <p>&nbsp;:
                                        {{ Auth::user()->instalasi ?? '-' }}
                                </p>
                            </td>


                        </tr>
                        <tr>
                            <td width=150px;>
                                <p align='left'> BULAN </p>
                            </td>

                            <td>
                                <p>&nbsp;:
                                        {{ $periode->bulan ?? '-' }}

                                </p>

                            </td>
                        </tr>
                        <tr>
                            <td width=200px;>
                                <p align='left'> TAHUN </p>
                            </td>


                            <td>
                                <p>&nbsp;:
                                        {{ $periode->tahun ?? '-' }}
                                </p>
                            </td>

                        </tr>
                    </tbody>
                </table>
                <h4 class="p-size"><b>A. Kuantitas</b></h4>
               <table class="tabel" width="100%" style="border-collapse: collapse; border: 1px solid;">
                        <thead>
                            <tr >
                                <th id="tabel"width="10%">No.</th>
                                <th id="tabel"width="50%">Indikator yang dinilai</th>
                                <th id="tabel"width="15%">Target</th>
                                <th id="tabel"width="16%">Bobot %</th>
                                <th id="tabel"width="15%">Capaian</th>
                                <th id="tabel"width="15%">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total=0; ?>
                            @foreach ($all as $key =>$data )
                            <tr>
                                <td id="tabel" width="20px">{{ $key+1 }}.</td>
                                <td id="tabel">{{ $data->indikator }}</td>
                                <td id="tabel" width="50px"><center>{{ $data->target }}</td>
                                <td id="tabel" width="61px"><center>{{ $data->bobot }}</td>
                                <td id="tabel" width="50px"><center>{{ $data->capaian }}</td>
                                <td id="tabel" width="50px"><center>{{ number_format($data->hasil ?? '0.00',2)  }}</td>
                            </tr>
                            <?php $total += $data->hasil ?>
                            @endforeach
                        </tbody>
                    </table>
                    <h4 class="p-size" align="right" style="margin-right:30px; "><b>Jumlah Kuantitas :   {{number_format($total ?? '0.00', 2) }}</b></h4>
                    <br>
                    <h4 class="p-size"><b>B. Kualitas</b></h4>
                    <table class="table" width="100%" style="border-collapse: collapse; border: 1px solid;">
                            <thead>
                                <tr>
                                    <th id="tabel" width="10%">No.</th>
                                    <th id="tabel" width="50%">Indikator yang dinilai</th>
                                    <th id="tabel" width="15%">Target</th>
                                    <th id="tabel" width="16%">Bobot %</th>
                                    <th id="tabel" width="15%">Capaian</th>
                                    <th id="tabel" width="15%">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalkualitas=0; ?>

                                @foreach ($kualitas as $key =>$data )
                                <tr>
                                    <td id="tabel" width="20px">{{ $key+1 }}.</td>
                                    <td id="tabel">{{ $data->indikator }}</td>
                                    <td id="tabel" width="50px"><center>{{ $data->target }}</td>
                                    <td id="tabel" width="61px"><center>{{ $data->bobot }}</td>
                                    <td id="tabel" width="50px"><center>{{ $data->capaian }}</td>
                                    <td id="tabel" width="50px"><center>{{ number_format($data->hasil ?? '0.00',2)  }}</td>
                                        <?php $totalkualitas += $data->hasil ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <h4 class="p-size" align="right" style="margin-right:30px; margin-top:0px"><b>Jumlah Kualitas :   {{number_format($totalkualitas ?? '0.00', 2) }}</b></h4>
                        <br>
                        <h4 class="p-size"><b>C. Perilaku</b></h4>
                        <table class="table" width="100%" style="border-collapse: collapse; border: 1px solid;">
                                <thead>
                                    <tr>
                                        <th id="tabel" width="10%">No.</th>
                                        <th id="tabel" width="50%">Indikator</th>
                                        <th id="tabel" width="10%">Definisi</th>
                                        <th id="tabel" width="10%">Bobot %</th>
                                        <th id="tabel" width="10%">Capaian</th>
                                        <th id="tabel" width="10%">Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perilaku as $key =>$data )
                                    <tr>
                                        <td id="tabel" width="20px">{{ 1 }}.</td>
                                        <td id="tabel" width="130px">{{ 'Keberadaan' }}</td>
                                        <td id="tabel">Berada di lingkungan/ di tempat kerja lebih 40 jam dalam seminggu.</td>
                                        <td id="tabel" width="61px"><center>{{ '15 %' }}</td>
                                        <td id="tabel" width="50px"><center>{{ $data->keberadaan }}</td>
                                            <?php $hasilkeberadaan = (15/100 * $data->keberadaan)  ?>
                                        <td id="tabel" width="50px"><center>  {{ number_format( $hasilkeberadaan ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td id="tabel" width="20px">{{ 2 }}.</td>
                                        <td id="tabel" width="130px">{{ 'Inisiatif' }}</td>
                                        <td id="tabel">Cepat mengenali masalah dan memprakarsai mengupayakan tindakan dan saran korektif</td>
                                        <td id="tabel" width="61px"><center>{{ '3 %' }}</td>
                                        <td id="tabel" width="50px"><center>{{ $data->inisiatif }}</td>
                                            <?php $hasilinisiatif = (3/100 * $data->inisiatif)?>
                                        <td id="tabel" width="50px"><center>{{ number_format( $hasilinisiatif ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td id="tabel" width="20px">{{ 3 }}.</td>
                                        <td id="tabel" width="130px">{{ 'Kehandalan' }}</td>
                                        <td id="tabel">Tugas rutin selesai tepat waktu tanpa kesalahan</td>
                                        <td id="tabel" width="61px"><center>{{ '3 %' }}</td>
                                        <td id="tabel" width="50px"><center>{{ $data->kehandalan }}</td>
                                            <?php $hasilkehandalan = (3/100 * $data->kehandalan)?>
                                        <td id="tabel" width="50px"><center>{{ number_format($hasilkehandalan ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td id="tabel" width="20px">{{ 4 }}.</td>
                                        <td id="tabel" width="130px">{{ 'Kepatuhan' }}</td>
                                        <td id="tabel">Taat pada aturan dan dapat memotivasi karyawan lain</td>
                                        <td id="tabel" width="61px"><center>{{ '3 %' }}</td>
                                        <td id="tabel" width="50px"><center>{{ $data->kepatuhan }}</td>
                                            <?php $hasilkepatuhan = (3/100 * $data->kepatuhan)?>
                                        <td id="tabel" width="50px"><center>{{ number_format($hasilkepatuhan ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td id="tabel" width="20px">{{ 5 }}.</td>
                                        <td id="tabel" width="130px">{{ 'Kerjasama' }}</td>
                                        <td id="tabel">Selalu siap dan sering memprakarsai kerjasama dan menerima masukkan  dan kritik dengan baik</td>
                                        <td id="tabel" width="61px"><center>{{ '3 %' }}</td>
                                        <td id="tabel" width="50px"><center>{{ $data->kerjasama }}</td>
                                            <?php $hasilkerjasama = (3/100 * $data->kerjasama)?>
                                        <td id="tabel" width="50px"><center>{{ number_format($hasilkerjasama ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td id="tabel" width="20px">{{ 6 }}.</td>
                                        <td id="tabel" width="130px">{{ 'Sikap Perilaku' }}</td>
                                        <td id="tabel">Antusias dengan tugasnya, senantiasa mau membantu, mampu dan aktif berkomunikasi dengan pelanggan</td>
                                        <td id="tabel" width="61px"><center>{{ '3 %' }}</td>
                                            <td id="tabel" width="50px"><center>{{ $data->sikap }}</td>
                                            <?php $hasilsikap= (3/100 * $data->sikap)?>
                                                    <td id="tabel" width="50px"><center>{{ number_format($hasilsikap ?? '0.00',2)  }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @php
                            if($total != NULL){

                                $total_nilai = ($hasilinisiatif  + $hasilkeberadaan + $hasilkehandalan + $hasilkepatuhan + $hasilkerjasama + $hasilsikap);
                            }else{

                                echo('0.00');
                            }
                            @endphp
                                <h4 class="p-size" align="right" style="margin-right:30px; margin-top: 0"><b>Total Nilai Perilaku : {{$total_nilai ?? '0.00' }}</b></h4>
                                <h4 class="p-size"><b>D. Kegiatan Tambahan</b></h4>
                                <table class="table" width="100%" style="border-collapse: collapse; border: 1px solid;">
                                        <thead>
                                            <tr>
                                                <th id="tabel" width="5%">No.</th>
                                                <th id="tabel" width="30%">Indikator yang dinilai</th>
                                                <th id="tabel" width="40%"><center>Uraian</th>
                                                <th id="tabel" width="15%"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $totaltambahan=0; ?>
                                                @php
                                                $key = 1;
                                                @endphp
                                                @foreach($kegiatan as $key => $data)
                                                @php $nilai= $key+2; @endphp

                                                     <?php $totaltambahan += ($nilai) ?>

                                                     @if ($totaltambahan >= 5)
                                                     @php
                                                     $totalnilai = 5;
                                                     @endphp
                                                 @else
                                                 @php
                                                     $totalnilai = $totaltambahan;
                                                 @endphp
                                                  @endif
                                            <tr>

                                                <td id="tabel">{{ $key+1 }}.</td>
                                                <td id="tabel">{{ 'Kegiatan Tambahan' }}</td>
                                                <td id="tabel">{{ $data->uraian }}</td>
                                                <td id="tabel"></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <h4 class="p-size" align="right" style="margin-right:50px;"><b>Kegiatan Tambahan : {{$totalnilai ?? '0.00'}}</b></h4>
                                    <?php $totalperilaku=0; ?>
                                    @foreach($perilaku as $data)
                                         <?php $totalperilaku += $data->jumlah ?>
                                    @endforeach

                                    @php
                                    if($total != NULL){

                                        $total_nilai = $totalperilaku  + $totalkualitas  +  $total + $totaltambahan;
                                    }else{

                                        echo('0.00');
                                    }
                                    @endphp
                                    <h4><b>Jumlah Total Capaian Kinerja :</b> <b class="total-size"> {{$total_nilai ?? '0.00', 2 }}</b></h4>
                                    @php $now = date_create()->format('d/m/Y'); @endphp

                                    <p style="text-align: right; margin-right:50px;">Palembang,{{$now}} </p>
                                    <p style="text-align: left; margin-left:30px;">Pejabat Penilai</p>
                                    <p style="text-align: right; margin-right:47px; margin-top:50px"> {{ Auth::user()->nama ?? '-' }}</p>
                                    <table  class="p-size" style="width: 90%; border: 1px solid; margin-left: auto; margin-top: 5%; margin-right: auto;">
                                    <tr>
                                        <td>
                                            <p style="text-align: center;">PERNYATAAN TANGGUNGJAWAB MUTLAK<br><br></p>
                                            <p>Dengan ini menyatakan dan bertanggungjawab secara penuh atas kebenaran seluruh data kegiatan yang telah saya input ke dalam Aplikasi SI-NIKINDU (Sistem Penilaian Kinerja Individu). Apabila dikemudian hari terbukti pernyataan ini tidak benar dan menimbulkan kerugian negara, saya bersedia mengembalikan kerugian negara tersebut.</p>
                                            <p style="text-align: right; margin-right:50px;">Palembang,{{$now}} </p>
                                            <p style="text-align: right; margin-right:47px; margin-top:60px"> {{ Auth::user()->nama ?? '-' }}</p>

                                        </td>
                                    </tr>
                                    </table>
                            </div>
                            </div>
                        </div>
                     </body>
                </html>
