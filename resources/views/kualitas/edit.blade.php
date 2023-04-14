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
                            <form action="{{ route('kualitas.update',['id_kualitas' => $kualitas->id_kualitas]) }}" method="post" enctype="multipart/form-data" >
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $kualitas->nama }}" required>
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="indikator">Indikator</label>
                                    <input type="text" name="indikator" class="form-control" value="{{ $kualitas->indikator }}" required>
                                    <p class="text-danger">{{ $errors->first('tanggal') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="definisi">Bulan</label>
                                    <input type="text" name="definisi" class="form-control" value="{{ $kualitas->definisi }}" required>
                                    <p class="text-danger">{{ $errors->first('definisi') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <input type="number" name="target" class="form-control" value="{{ $kualitas->target }}" required>
                                    <p class="text-danger">{{ $errors->first('target') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <input type="text" name="bobot" class="form-control" value="{{ $kualitas->bobot }}" required>
                                    <p class="text-danger">{{ $errors->first('bobot') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="capaian">capaian</label>
                                    <input type="text" name="capaian" class="form-control" value="{{ $kualitas->capaian }}" required>
                                    <p class="text-danger">{{ $errors->first('capaian') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="hasil">Hasil</label>
                                    <input type="text" name="hasil" class="form-control" value="{{ $kualitas->hasil }}">
                                    <p class="text-danger">{{ $errors->first('hasil') }}</p>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="instalasi" id="indikator" value="{{ $kualitas->instalasi }}" hidden>
                                    <p class="text-danger">{{ $errors->first('hasil') }}</p>
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
