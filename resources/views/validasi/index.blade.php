@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Validasi Data Pegawai</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                    @csrf
                                           <h4>Data Validasi</h4>
                                </h3>
                            </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Perilaku</th>
                                        <th>Kualitas</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($perilaku as $key => $d)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{number_format($d->jumlah ?? '0.00', 2) }}</td>
                                        @foreach ($kualitas as $data)
                                            @if ($data->nama == $d->nama)
                                                <td>{{number_format($data->total_kualitas?? '0.00', 2) }}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <center><a href="{{ route('validasihasil',[$d->nama]) }}" class="btn btn-warning btn-sm">Validasi</a></center>

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
