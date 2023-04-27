@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Target</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>{{ $pegawai->nama }}</h4>
                            <p>{{ $pegawai->jabatan }} - {{ $pegawai->instalasi }}</p>
                            <h5><br></h5>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4>Periode Target</h4>
                            <p>{{ $periode->bulan }} - {{ $periode->tahun }}</p>
                            <h5><br></h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4>Atasan 1</h4>
                            <p>{{ $pegawai->atasan1 }}</p>
                            <h5><button type='button' class='badge badge-pill badge-success' data-toggle="modal" data-target="#modal-lg"><i class='ti-check-box'></i>&nbsp; Validasi Semua </button></h5>
                        </div>
                    </div>
                </div>
                @if ($pegawai->atasan2 == " ")
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Atasan 2</h4>
                            <p>{{'-'}}</p>
                            <h5> <br></h5>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Atasan 2</h4>
                            <p>{{ $pegawai->atasan2 }}</p>
                            <h5><br></h5>

                        </div>
                    </div>
                </div>
                @endif


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Data Kegiatan
                                </h3>
                            </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th width="20%">Nama</th>
                                        <th>Uraian</th>
                                        <th>Tugas</th>
                                        <th width="5%">Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($all as $key => $d)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->tugas }}</td>
                                        <td>{{ $d->uraian }}</td>
                                        @php
                                            if ($d->kepala_instalasi == "Telah Disetujui") {
                                                $bandage = 'badge badge-pill badge-success';
                                            } elseif ($d->kepala_instalasi == "Belum Disetujui") {
                                                $bandage = 'badge badge-pill badge-warning';
                                            } else {
                                                $bandage = 'badge badge-pill badge-warning';
                                            }
                                       @endphp
                                        <td><span class="{{$bandage}}" style="font-size:12px;  color:rgb(255, 255, 255)">{{ $d->kepala_instalasi }}</span></td>
                                        <td>
                                            {{-- <form action="{{ route('target.destroy', $d->Id_Target) }}" method="post">
                                                @csrf
                                                @method('DELETE') --}}
                                                <a  href="{{ route('kegiatanget',[$d->IdCatKegiatan]) }}" data-toggle="modal" data-target="#modal-lg{{$d->IdCatKegiatan}}" class="btn btn-warning btn-sm"><center>Verifikasi</center></a>
                                            </form>
                                        </td>
                                        @include('validasikegiatan.validasi.kepalainstalasi')
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@foreach ($all as $key => $d)
    @include('validasikegiatan.validasi.allvalidasikegiatan')
@endforeach
@endsection

