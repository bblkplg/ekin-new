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

    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>{{ Auth::user()->nama }}</h4>
                            <p>{{ Auth::user()->jabatan }} - {{ Auth::user()->instalasi }}</p>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4>Periode Target</h4>
                            <p>{{ $periode->bulan }} - {{ $periode->tahun }}</p>
                            <br>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4>Atasan 1</h4>
                            <p>{{ $atasan1 }}</p>
                            <br>

                        </div>
                    </div>
                </div>

                @if (Auth::user()->atasan2 == " ")
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Atasan 2</h4>
                            <p>{{'-'}}</p>
                            <br>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Atasan 2</h4>
                            <p>{{ $atasan2 }}</p>
                            <br>
                        </div>
                    </div>
                </div>
                @endif


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <form class="forms-sample" action="{{route('kegiatan.store')}}" method="POST">
                                  @csrf
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <select class="form-control" name="tugas" width='100'>
                                                <option selected disabled>Pilih Target Kegiatan</option>
                                                @foreach ($target as $i)
                                                    <option value="{{ $i->tugas }}">{{ $i->tugas }}</option>
                                                @endforeach
                                                <option value="Kegiatan Tambahan">Kegiatan Tambahan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-6">
                                            <input type="text" class="form-control" name="uraian" placeholder="DO/Uraian Kinerja">
                                        </div>
                                        <div class="col-sm-1">

                                            <input type="number" class="form-control" name="tanggal" placeholder="Tanggal">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="noorder" placeholder="Order">
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
                                        <td>No</td>
                                        <td style="width:5%">Tanggal</td>
                                        <td style="width:20%">Tugas</td>
                                        <td style="width:30%">Uraian</td>
                                        <td style="width:15%">No Order</td>
                                        <td>Jumlah</td>
                                        <td>Persetujuan</td>
                                        <td style="width:12%">Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $key => $d)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $d->tanggal ?? '-' }}</td>
                                        <td>{{ $d->tugas ?? '-' }}</td>
                                        <td>{{ $d->uraian ?? '-' }}</td>
                                        <td>{{ $d->noorder ?? '-' }}</td>
                                        <td>{{ $d->mulai ?? '-' }}</td>
                                        @php
                                        if ($d->kepala_instalasi == "Telah Disetujui") {
                                            $bandage = 'badge badge-pill badge-success';
                                            $kepala_instalasi = 'Telah Disetujui';
                                        } elseif ($d->kepala_instalasi == "Belum Disetujui") {
                                            $bandage = 'badge badge-pill badge-warning';
                                            $kepala_instalasi = 'Tidak Disetujui';
                                        } else {
                                            $bandage = 'badge badge-pill badge-warning';
                                            $kepala_instalasi = 'Tidak Disetujui';
                                        }
                                    @endphp
                                    <div class="col identitas">
                                        <td><span class='{{$bandage}}'>{{$d->kepala_instalasi }}</span></td>
                                    </div>

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
