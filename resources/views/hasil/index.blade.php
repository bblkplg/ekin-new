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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Hasil</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <td>Bulan - Tahun</td>
                                        <td>Indikator</td>
                                        <td>Target</td>
                                        <td>Bobot</td>
                                        <td>Capaian</td>
                                        <td>Hasil</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $d)
                                    <tr>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->bulan }} - {{ $d->tahun }}</td>
                                        <td>{{ $d->indikator }}</td>
                                        <td>{{ $d->target }}</td>
                                        <td>{{ $d->bobot }}</td>
                                        <td>{{ $d->capaian }}</td>
                                        <td>{{ $d->hasil }}</td>
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
