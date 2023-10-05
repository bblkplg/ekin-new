@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Target</h1>
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Target</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('target.update',[$target->Id_Target]) }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $target->nama }}"  readonly>
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="instalasi">Instalasi</label>
                                    <input type="text" name="instalasi" class="form-control" value="{{ $target->instalasi }}" readonly>
                                    <p class="text-danger">{{ $errors->first('instalasi') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="bulan">Tahun</label>
                                    <input type="text" name="bulan" class="form-control" value="{{ $target->bulan }}" readonly>
                                    <p class="text-danger">{{ $errors->first('bulan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tugas">Tugas</label>
                                    <input type="text" name="tugas" class="form-control" value="{{ $target->tugas }}" required>
                                    <p class="text-danger">{{ $errors->first('tugas') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <input type="text" name="target" class="form-control" value="{{ $target->target }}" required>
                                    <p class="text-danger">{{ $errors->first('target') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="persentase">Persentase</label>
                                    <input type="text" name="persentase" class="form-control" value="{{ $target->persentase }}" required>
                                    <p class="text-danger">{{ $errors->first('persentase') }}</p>
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
