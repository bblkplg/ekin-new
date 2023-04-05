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
                            <h3 class="card-title">
                    
                            </h3>
                            <div class="float-right">
                                <a href="{{ route('indikator.create') }}" class="btn btn-primary btn-sm">Tambah</a>
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
                                    @foreach ($all as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->indikator }}</td>
                                        <td>{{ $d->instalasi }}</td>
                                        <td>{{ $d->idindikator }}</td>
                                        <td> 
                                            <form action="{{ route('indikator.destroy', $d->nama) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('indikator.edit',['nama' => $d->nama,'bulan' => $d->bulan, 'tugas' => $d->tugas ]) }}" class="btn btn-warning btn-sm">Edit</a>
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
