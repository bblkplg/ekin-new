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
                            <h3 class="card-title">
                                Edit Data Indikator
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('datapegawai.update',[$datapegawai->id]) }}">
                                @csrf
                                @method('PUT')
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{ $datapegawai->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan">
                                            @foreach ($jabatan as $data)
                                                <option value="{{ $data->jabatan }}" @if ($data->jabatan == $datapegawai->jabatan) {{'selected'}} @endif>{{ $data->jabatan }}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" value="{{ $datapegawai->password }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Instalasi</label>
                                        <select class="form-control" name="instalasi">
                                            @foreach ($instalasi as $data)
                                                <option value="{{ $data->instalasi }}" @if ($data->instalasi == $datapegawai->instalasi) {{'selected'}} @endif>{{ $data->instalasi }}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Atasan 1</label>
                                        <select class="form-control" name="atasan1">
                                            @foreach ($atasan1 as $data)
                                                <option value="{{ $data->atasan1 }}" @if ($data->atasan1 == $datapegawai->atasan1) {{'selected'}} @endif>{{ $data->atasan1 }}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Atasan 2</label>
                                        <select class="form-control" name="atasan2">
                                            @foreach ($atasan2 as $data)
                                                <option value="{{ $data->atasan2 }}" @if ($data->atasan2 == $datapegawai->atasan2) {{'selected'}} @endif>{{ $data->atasan2 }}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Api Id</label>
                                        <input type="text" class="form-control" name="api_id" value="{{ $datapegawai->api_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="{{ 'aktif' }}" @if ($datapegawai->status == 'aktif') {{'selected'}} @endif>{{ 'aktif' }}</option>  
                                            <option value="{{ 'nonaktif' }}" @if ($datapegawai->status == 'nonaktif') {{'selected'}} @endif>{{ 'nonaktif' }}</option>  
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection
