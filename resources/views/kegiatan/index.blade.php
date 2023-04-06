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
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>{{ Auth::user()->nama }}</h4>
                            <p>{{ Auth::user()->jabatan }} - {{ Auth::user()->instalasi }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4>Periode</h4>
                            {{-- <p>{{ $periode->bulan }} - {{ $periode->tahun }}</p> --}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4>Atasan 1</h4>
                            <p>{{ $atasan1 }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Atasan 2</h4>
                            <p>{{ $atasan2 }}</p>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <form>
                                <table>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="tugas" width='100'>
                                                @foreach ($target as $i)
                                                    <option value="{{ $i->tugas }}">{{ $i->tugas }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="indikator" placeholder="DO/Uraian Kinerja"></td>
                                        <td><input type="number" class="form-control" name="target" placeholder="Tanggal"></td>
                                        <td><input type="number" class="form-control" name="target" placeholder="Order"></td>
                                        <td><input type="number" class="form-control" name="persentase"  placeholder="Jumlah"></td>
                                        <td class="float-right">
                                            <a href="{{ route('target.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                                        </td>
                                    </tr>
                                </table>
                            </form></h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Tugas</td>
                                        <td>Uraian</td>
                                        <td>No Order</td>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $d)
                                    <tr>
                                        <td>{{ $d->tanggal }}</td>
                                        <td>{{ $d->tugas }}</td>
                                        <td>{{ $d->uraian }}</td>
                                        <td>{{ $d->noorder }}</td>
                                    <td>
                                            <form action="{{ route('target.destroy', $d->nama) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('target.edit',['nama' => $d->nama,'bulan' => $d->bulan, 'tugas' => $d->tugas ]) }}" class="btn btn-warning btn-sm">Edit</a>
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
