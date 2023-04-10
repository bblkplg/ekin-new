@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Indikator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Indikator</li>
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

                            <h3 class="card-title">
                                List Data Indikator
                            </h3>
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
                                        <th>#</th>
                                        <th>Indikator</th>
                                        <th>Instalasi</th>
                                        <th>ID</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($all as $indikator)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $indikator->indikator }}</td>
                                        <td>{{ $indikator->instalasi }}</td>
                                        <td>{{ $indikator->idindikator }}</td>
                                        <td> 
                                            <form action="{{ route('indikator.destroy', [$indikator->idindikator]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('indikator.edit',[$indikator->idindikator]) }}" class="btn btn-warning btn-sm">Edit</a>
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
                       <form method="POST" action="{{ route('indikator.store') }}">
                        @csrf
                            <div class="form-group">
                                <label>Indikator</label>
                                <input type="text" class="form-control" name="indikator" required>
                            </div>
                            <div class="form-group">
                                <label>Instalasi</label>
                                <select class="form-control" name="instalasi">
                                    @foreach ($ins as $data)
                                        <option value="{{ $data->instalasi }}">{{ $data->instalasi }}</option>  
                                    @endforeach
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
