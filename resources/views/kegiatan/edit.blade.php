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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Target</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('kegiatan.update', $kegiatan->IdCatKegiatan) }}" method="post" enctype="multipart/form-data" >
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $kegiatan->nama }}" required>
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="tanggal">tanggal</label>
                                    <input type="text" name="tanggal" class="form-control" value="{{ $kegiatan->tanggal }}" required>
                                    <p class="text-danger">{{ $errors->first('tanggal') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <input type="text" name="bulan" class="form-control" value="{{ $kegiatan->bulan }}" required>
                                    <p class="text-danger">{{ $errors->first('bulan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="{{ $kegiatan->tahun }}" required>
                                    <p class="text-danger">{{ $errors->first('tahun') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tugas">Tugas</label>
                                    <input type="text" name="tugas" class="form-control" value="{{ $kegiatan->tugas }}" required>
                                    <p class="text-danger">{{ $errors->first('tugas') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="uraian">uraian</label>
                                    <input type="text" name="uraian" class="form-control" value="{{ $kegiatan->uraian }}" required>
                                    <p class="text-danger">{{ $errors->first('uraian') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="noorder">noorder</label>
                                    <input type="text" name="noorder" class="form-control" value="{{ $kegiatan->noorder }}">
                                    <p class="text-danger">{{ $errors->first('noorder') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Update</button>
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
