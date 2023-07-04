@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Hasil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Hasil</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row flex-grow">
            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                <div class="card bg-primary card-rounded">
                    <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-4"></h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 class="text-white mb-3"><b>{{'Pegawai'}} </b><br></h5>
                                <h5 class="text-white mb-2">{{ Auth::user()->nama }} <br></h5>
                                <h5 class="text-white mb-2">{{ Auth::user()->jabatan }}<br/></h5>
                                <h5 class="text-white mb-2">{{ Auth::user()->instalasi }} <br></h5>
                                <p  style="color:rgb(0, 255, 123)">{{$periode->bulan}}</p>
                                <h2  style="color:rgb(0, 255, 157)">{{$periode->tahun}}</h2>
                            </div>
                            <div class="col-sm-4">
                                        <h5 class="text-white mb-3"><b>{{'Atasan 1'}} </b><br></h5>
                                        <h5 class="text-white mb-4">{{ Auth::user()->atasan1 }}</h5>

                            </div>
                            @if (Auth::user()->atasan2 != '')
                            <div class="col-sm-4">
                                <h5 class="text-white mb-3"><b>{{'Atasan 2'}} </b><br></h5>
                                <h5 class="text-white mb-4">{{ Auth::user()->atasan2 }}</h5>

                            </div>
                            @endif
                        </div>
                        <hr>
                        <p class="text-white mb-4">Informasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <section class="content">
        <div class="container">
            <div class="row flex-grow">
                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"><b>Hasil Kinerja Pegawai</b></h2><br>
                            <a type="button" href="{{ url('print-hasil') }}" class="btn btn-primary btn-lg" target="_blank"><i class='fa fa-print'></i> Print Hasil</a>
                            <a type="button" href="{{ url('hasil-pdf') }}" class="btn btn-primary btn-lg" target="_blank"><i class='fa fa-print'></i> Cetak Hasil</a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                        <td>Indikator</td>
                                        <td>Target</td>
                                        <td>Bobot %</td>
                                        <td>Capaian</td>
                                        <td>Hasil %</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total=0; ?>
                                    @foreach ($all as $d)
                                    <tr>
                                        <td>{{ $d->indikator ?? '0.00' }}</td>
                                        <td>{{ $d->target ?? '0.00' }}</td>
                                        <td>{{ $d->bobot ?? '0.00' }}</td>
                                        <td>{{ $d->capaian ?? '0.00' }}</td>
                                        <td>{{ number_format($d->hasil ?? '0.00', 2) }}</td>
                                        <?php $total += $d->hasil ?>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-info" style="background-color: #8dedef;">

                <div class="container">
                    <br>
                    <h4 style="color:black"><i class='fas fa-file-alt' style="color:black"></i>  <b>Hasil Ekinerja</b></h4>
                    <br>
                    <table id="order-listing" class="table">
                        <tbody>
                            <tr>
                                <td colspan="5" style="color:black"><h6>Kuantitas</h6></td>
                                <td align="center" style="color:black">{{number_format($total ?? '0.00', 2) }}</td>
                            </tr>

                            <tr>
                                <td colspan="5" style="color:black"><h6>Kualitas</h6></td>
                                    <td align="center" style="color:black">
                                        <?php $totalkualitas=0; ?>
                                        @foreach($kualitas as $data)
                                             <?php $totalkualitas += $data->hasil ?>
                                        @endforeach
                                       {{number_format($totalkualitas?? '0.00', 2) }}
                                    </td>
                            </tr>
                            <tr>
                                <td colspan="5"style="color:black"><h6>Perilaku</h6></td>
                                <td align="center" style="color:black">
                                    <?php $totalperilaku=0; ?>
                                    @foreach($perilaku as $data)
                                         <?php $totalperilaku += $data->jumlah ?>
                                    @endforeach
                                   {{number_format($totalperilaku ?? '0.00', 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="color:black"><h6>Kegiatan Tambahan</h6></td>
                                <td align="center" style="color:black">
                                    <?php $totaltambahan=0; ?>
                                    @php
                                    $key = 1;
                                    @endphp
                                    @foreach($kegiatan as $key => $data)
                                    @php $nilai= $key+2; @endphp

                                         <?php $totaltambahan += ($nilai) ?>
                                    @endforeach
                                    @if ($totaltambahan >= 5)
                                        @php
                                        $totalnilai = 5;
                                        @endphp
                                    @else
                                    @php
                                        $totalnilai = $totaltambahan;
                                    @endphp
                                     @endif
                                    {{number_format($totalnilai ?? '0', 0) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="background-color: #29dee1; color:black">
                                    <center><h6><b>Total Nilai Kinerja Individu</b></h6></center>

                                </td>

                                @php
                                if ($total != NULL){
                                $total_nilai = $totalperilaku  + $totalkualitas  +  $total + $totalnilai;
                             } else{
                                 echo('0.00');
                            }
                                @endphp
                                <td style="background-color: #1e5896; " align="center">{{$total_nilai ?? '0.00', 2 }}</td>

                            <tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>

    </section>
    <br>

</div>

@endsection
