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
              <h4><center><b>LAPORAN HASIL E-KINERJA PEGAWAI</center></b></h4>
              <h4><center><b>BALAI BESAR LABORATORIUM KESEHATAN PALEMBANG</center></b></h4>
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
                <p>A. Kuantitas</p>
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
                            @foreach ($all as $key =>$data )
                            <tr>
                                <td>{{ $key+1 }}.</td>
                                <td>Indikator yang dinilai</td>
                                <td>Target</td>
                                <td>Bobot %</td>
                                <td>Capaian</td>
                                <td>Hasil</td>
                            </tr>
                            @endforeach
                        </tbody>

                </table>
