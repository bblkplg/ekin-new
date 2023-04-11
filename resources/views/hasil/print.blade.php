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
    h4,p{
        font-family: arial, Helvetica, sans-serif;
        font-size: 14px;
    }
    .p-size{
        font-family: arial, Helvetica, sans-serif;
        font-size: 16px;
    }
    .center {
  margin-left: auto;
  margin-right: auto;
}
    body.receipt .sheet { width: 58mm; height: 50mm } /* sheet size */
    @media print {  body.receipt { width: 58mm }.pagebreak {
        clear: both;
        page-break-after: always
    } } /* fix for Chrome */
    .solid {border-style: solid;}
</style>
<body>
    <div class="form-group">

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
                <table class="table" border="4px" style="border-width:2px; border-color:black">
                        <thead>
                            <tr>
                                <th style="border-width:1px; border-color:black">No.</th>
                                <th style="border-width:1px; border-color:black">Indikator yang dinilai</th>
                                <th style="border-width:1px; border-color:black">Target</th>
                                <th style="border-width:1px; border-color:black">Bobot %</th>
                                <th style="border-width:1px; border-color:black">Capaian</th>
                                <th style="border-width:1px; border-color:black">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total=0; ?>
                            @foreach ($all as $key =>$data )
                            <tr>
                                <td width="20px">{{ $key+1 }}.</td>
                                <td>{{ $data->indikator }}</td>
                                <td width="110px"><center>{{ $data->target }}</td>
                                <td width="110px"><center>{{ $data->bobot }}</td>
                                <td width="110px"><center>{{ $data->capaian }}</td>
                                <td width="110px"><center>{{ number_format($data->hasil ?? '0.00',2)  }}</td>
                            </tr>
                            <?php $total += $data->hasil ?>
                            @endforeach
                        </tbody>
                    </table>
                        <h4 class="p-size" align="right" style="margin-right:30px; margin-top:-10px"><b>Jumlah Kuantitas : {{number_format($total ?? '0.00', 2) }}</b></h4>
                    <br>
                  <h4 class="p-size"><b>B. Kualitas</b></h4>
                    <table class="table" border="4px" style="border-width:2px; border-color:black">
                            <thead>
                                <tr>
                                    <th style="border-width:1px; border-color:black">No.</th>
                                    <th style="border-width:1px; border-color:black">Indikator yang dinilai</th>
                                    <th style="border-width:1px; border-color:black">Target</th>
                                    <th style="border-width:1px; border-color:black">Bobot %</th>
                                    <th style="border-width:1px; border-color:black">Capaian</th>
                                    <th style="border-width:1px; border-color:black">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalkualitas=0; ?>

                                @foreach ($kualitas as $key =>$data )
                                <tr>
                                    <td width="20px">{{ $key+1 }}.</td>
                                    <td>{{ $data->indikator }}</td>
                                    <td width="110px"><center>{{ $data->target }}</td>
                                    <td width="110px"><center>{{ $data->bobot }}</td>
                                    <td width="110px"><center>{{ $data->capaian }}</td>
                                    <td width="110px"><center>{{ number_format($data->hasil ?? '0.00',2)  }}</td>
                                        <?php $totalkualitas += $data->hasil ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <h4 class="p-size" align="right" style="margin-right:30px; margin-top:-10px"><b>Jumlah Kuantitas : {{number_format($totalkualitas ?? '0.00', 2) }}</b></h4>
                        <br>
                        <h4 class="p-size"><b>C. Perilaku</b></h4>
                        <table class="table" border="4px" style="border-width:2px; border-color:black">
                                <thead>
                                    <tr>
                                        <th style="border-width:1px; border-color:black">No.</th>
                                        <th style="border-width:1px; border-color:black">Indikator</th>
                                        <th style="border-width:1px; border-color:black">Definisi</th>
                                        <th style="border-width:1px; border-color:black">Bobot %</th>
                                        <th style="border-width:1px; border-color:black">Capaian</th>
                                        <th style="border-width:1px; border-color:black">Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perilaku as $key =>$data )
                                    <tr>
                                        <td width="20px">{{ 1 }}.</td>
                                        <td width="180px">{{ 'Keberadaan' }}</td>
                                        <td>Berada di lingkungan/ di tempat kerja lebih 40 jam dalam seminggu.</td>
                                        <td width="110px"><center>{{ '15 %' }}</td>
                                        <td width="110px"><center>{{ $data->keberadaan }}</td>
                                            <?php $hasilkeberadaan = (15/100 * $data->keberadaan)  ?>
                                        <td width="110px"><center>  {{ number_format( $hasilkeberadaan ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20px">{{ 2 }}.</td>
                                        <td width="180px">{{ 'Inisiatif' }}</td>
                                        <td>Cepat mengenali masalah dan memprakarsai mengupayakan tindakan dan saran korektif</td>
                                        <td width="110px"><center>{{ '3 %' }}</td>
                                        <td width="110px"><center>{{ $data->inisiatif }}</td>
                                            <?php $hasilinisiatif = (3/100 * $data->inisiatif)?>
                                        <td width="110px"><center>{{ number_format( $hasilinisiatif ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20px">{{ 3 }}.</td>
                                        <td width="180px">{{ 'Kehandalan' }}</td>
                                        <td>Tugas rutin selesai tepat waktu tanpa kesalahan</td>
                                        <td width="110px"><center>{{ '3 %' }}</td>
                                        <td width="110px"><center>{{ $data->kehandalan }}</td>
                                            <?php $hasilkehandalan = (3/100 * $data->kehandalan)?>
                                        <td width="110px"><center>{{ number_format($hasilkehandalan ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20px">{{ 4 }}.</td>
                                        <td width="180px">{{ 'Kepatuhan' }}</td>
                                        <td>Taat pada aturan dan dapat memotivasi karyawan lain</td>
                                        <td width="110px"><center>{{ '3 %' }}</td>
                                        <td width="110px"><center>{{ $data->kepatuhan }}</td>
                                            <?php $hasilkepatuhan = (3/100 * $data->kepatuhan)?>
                                        <td width="110px"><center>{{ number_format($hasilkepatuhan ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20px">{{ 5 }}.</td>
                                        <td width="180px">{{ 'Kerjasama' }}</td>
                                        <td>Selalu siap dan sering memprakarsai kerjasama dan menerima masukkan  dan kritik dengan baik</td>
                                        <td width="110px"><center>{{ '3 %' }}</td>
                                        <td width="110px"><center>{{ $data->kerjasama }}</td>
                                            <?php $hasilkerjasama = (3/100 * $data->kerjasama)?>
                                        <td width="110px"><center>{{ number_format($hasilkerjasama ?? '0.00',2)  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20px">{{ 6 }}.</td>
                                        <td width="180px">{{ 'Sikap Perilaku' }}</td>
                                        <td>Antusias dengan tugasnya, senantiasa mau membantu, mampu dan aktif berkomunikasi dengan pelanggan</td>
                                        <td width="110px"><center>{{ '3 %' }}</td>
                                            <td width="110px"><center>{{ $data->sikap }}</td>
                                            <?php $hasilsikap= (3/100 * $data->sikap)?>
                                                    <td width="110px"><center>{{ number_format($hasilsikap ?? '0.00',2)  }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                 @php $total_nilai = ($hasilinisiatif  + $hasilkeberadaan + $hasilkehandalan + $hasilkepatuhan + $hasilkerjasama + $hasilsikap); @endphp
                                <h4 class="p-size" align="right" style="margin-right:30px; margin-top:-10px"><b>Jumlah Kuantitas : {{$total_nilai }}</b></h4>
                                <h4 class="p-size"><b>D. Kegiatan Tambahan</b></h4>
                                <table class="table" border="4px" style="border-width:2px; border-color:black">
                                        <thead>
                                            <tr>
                                                <th style="border-width:1px; border-color:black">No.</th>
                                                <th style="border-width:1px; border-color:black">Indikator yang dinilai</th>
                                                <th style="border-width:1px; border-color:black"><center>Uraian</th>
                                                <th style="border-width:1px; border-color:black"></th>

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

                                                <td width="20px">{{ $key+1 }}.</td>
                                                <td width="180px">{{ 'Kegiatan Tambahan' }}</td>
                                                <td width="400px">{{ $data->uraian }}</td>
                                                <td width="110px"></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                        <h4 class="p-size" align="right" style="margin-right:30px; margin-top:-10px"><b>Kegiatan Tambahan : {{$totalnilai }}</b></h4>
                                        <?php $totalperilaku=0; ?>
                                        @foreach($perilaku as $data)
                                             <?php $totalperilaku += $data->jumlah ?>
                                        @endforeach

                                        @php $total_nilai = $totalperilaku  + $totalkualitas  +  $total + $totaltambahan ; @endphp
                                        <h4><b>Jumlah Total Capaian Kinerja :  {{$total_nilai ?? '0.00', 2 }}</b></h4>
