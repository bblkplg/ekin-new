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
                            @if (session()->has('success'))
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                {{ session('success')}}
                            </div>
                            @endif
                            <h3 class="card-title">List Data Pegawai</h3>
                            <div class="float-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Nama</td>
                                        <td>Jabatan</td>
                                        <td>Password</td>
                                        <td>Instalasi</td>
                                        <td>Atasan 1</td>
                                        <td>Atasan 2</td>
                                        <td>Api ID</td>
                                        <td>Status</td>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->jabatan }}</td>
                                        <td>{{ $d->password }}</td>
                                        <td>{{ $d->instalasi }}</td>
                                        <td>{{ $d->atasan1 }}</td>
                                        <td>{{ $d->atasan2 }}</td>
                                        <td>{{ $d->api_id }}</td>
                                        <td>{{ $d->status }}</td>
                                        <td> 
                                            <form action="{{ route('datapegawai.destroy', [$d->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('datapegawai.edit',[$d->id]) }}" class="btn btn-warning btn-sm">Edit</a>
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

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <form method="POST" action="{{ route('datapegawai.store') }}">
                        @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-control" name="jabatan">
                                    @foreach ($jabatan as $data)
                                        <option value="{{ $data->jabatan }}">{{ $data->jabatan }}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Instalasi</label>
                                <select class="form-control" name="instalasi">
                                    @foreach ($instalasi as $data)
                                        <option value="{{ $data->instalasi }}">{{ $data->instalasi }}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Atasan 1</label>
                                <select class="form-control" name="atasan1">
                                    @foreach ($atasan1 as $data)
                                        <option value="{{ $data->atasan1 }}">{{ $data->atasan1 }}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Atasan 2</label>
                                <select class="form-control" name="atasan2">
                                    @foreach ($atasan2 as $data)
                                        <option value="{{ $data->atasan2 }}">{{ $data->atasan2 }}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Api Id</label>
                                <input type="text" class="form-control" name="api_id" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="{{ 'aktif' }}">{{ 'aktif' }}</option>  
                                    <option value="{{ 'nonaktif' }}">{{ 'nonaktif' }}</option>  
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
