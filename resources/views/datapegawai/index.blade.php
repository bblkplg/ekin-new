@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
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
                            <h3 class="card-title">Data Pegawai</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>Jabatan</td>
                                        <td>Password</td>
                                        <td>Instalasi</td>
                                        <td>Atasan 1</td>
                                        <td>Atasan 2</td>
                                        <td>ID</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $d)
                                    <tr>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->jabatan }}</td>
                                        <td>{{ $d->password }}</td>
                                        <td>{{ $d->instalasi }}</td>
                                        <td>{{ $d->atasan1 }}</td>
                                        <td>{{ $d->atasan2 }}</td>
                                        <td>{{ $d->api_id }}</td>
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
