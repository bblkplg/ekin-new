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
                        <li class="breadcrumb-item active">Data Kegiatan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
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
                                    <p  style="color:rgb(0, 255, 123)"><b>{{$periode->bulan}}</b></p>
                                    <h2  style="color:rgb(0, 255, 157)"><b>{{$periode->tahun}}</b></h2>
                                </div>
                                <div class="col-sm-4">
                                            <h5 class="text-white mb-3"><b>{{'Atasan 1'}} </b><br></h5>
                                            <h5 class="text-white mb-4">{{ Auth::user()->atasan1 }}</h5>
                                            <h5 class="text-white mb-4"></h5>
                                            <h5 class="text-white mb-4"></h5>

                                            @foreach ($validasi as $datavalidasi)
                                            @php
                                            if ($datavalidasi->kepala_instalasi == 'Telah Disetujui') {
                                                $bandage = 'badge badge-pill badge-success';
                                                $atasan_2 = 'Disetujui';
                                            } elseif ($datavalidasi->kepala_instalasi == 'Belum Disetujui') {
                                                $bandage = 'badge badge-pill badge-danger';
                                                $atasan_2 = 'Belum Disetujui';
                                            } else {
                                                $bandage = 'badge badge-pill badge-warning';
                                                $atasan_2 = 'Menunggu Persetujuan';
                                            }
                                            @endphp
                                         @endforeach
                                            <h5><button type='button' class='{{$bandage}}'><i class='fa fa-info'> </i> {{$atasan_2}}</button></h5>
                                            {{-- @include('staff.hasil.atasan1') --}}
                                </div>
                                @if (Auth::user()->atasan2 == '')
                                <div class="col-sm-4">
                                    <h4 class="card-title card-title-dash text-white mb-4">{{ 'Atasan 2' }}</h4>
                                    <h5 class="text-white mb-4">{{ Auth::user()->atasan2 }}</h5>
                                    <h3><button type='button' class='' data-bs-toggle='modal' data-bs-target=''><i class='ti-info'></i>&nbsp;</button></h3>
                                    {{-- @include('staff.hasil.atasan2') --}}
                                </div>
                                @endif
                            </div>
                            <hr>
                            <p class="text-white mb-4">Informasi</p>
                            </div>
                        </div>
                    </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <form class="forms-sample" action="{{route('kegiatan.store')}}" method="POST">
                                  @csrf
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <select class="form-control" name="tugas" width='100'>
                                                @foreach ($target as $i)
                                                    <option value="{{ $i->tugas }}">{{ $i->tugas }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-6">
                                            <input type="text" class="form-control" name="uraian" placeholder="DO/Uraian Kinerja">
                                        </div>
                                        <div class="col-sm-1 ">

                                            <input type="number" class="form-control" name="tanggal" placeholder="Tanggal">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="noorder" placeholder="Order">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" name="mulai"  placeholder="Jumlah">
                                        </div>
                                        <div class="col-sm-1">
                                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                             </h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Tugas</td>
                                        <td>Uraian</td>
                                        <td>No Order</td>
                                        <td>Jumlah</td>
                                        <td>Persetujuan</td>
                                        <td style="width:12%">Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $d)
                                    <tr>
                                        <td>{{ $d->tanggal ?? '-' }}</td>
                                        <td>{{ $d->tugas ?? '-' }}</td>
                                        <td>{{ $d->uraian ?? '-' }}</td>
                                        <td>{{ $d->noorder ?? '-' }}</td>
                                        <td>{{ $d->mulai ?? '-' }}</td>
                                        <td>{{ $d->kepala_instalasi ?? '-' }}</td>
                                    <td>
                                            <form action="{{ route('kegiatan.destroy', $d->IdCatKegiatan) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('kegiatan.edit',[$d->IdCatKegiatan]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
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

@endsection
