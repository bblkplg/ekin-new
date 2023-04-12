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

    <section class="content-header">
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
                            <h4>Periode Target</h4>
                            <p>{{ $periode->bulan }} - {{ $periode->tahun }}</p>
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

                @if (Auth::user()->atasan2 == " ")
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Atasan 2</h4>
                            <p>{{'-'}}</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Atasan 2</h4>
                            <p>{{ $atasan2 }}</p>
                        </div>
                    </div>
                </div>
                @endif


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <form class="forms-sample" action="{{route('target.store')}}" method="POST">
                                    @csrf
                                    <div class="form-row col-12" >
                                         <div class="col-md-4 mb-6">
                                            <select class="form-control" name="tugas" width='100'>
                                                <option selected disabled>Pilih Indikator Target</option>
                                                @foreach ($indikator as $i)
                                                    <option value="{{ $i->indikator }}">{{ $i->indikator }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-6">
                                            <input type="number" class="form-control" name="target" placeholder="Target">
                                        </div>
                                        <div class="col-md-3 mb-6">
                                            <input type="number" class="form-control" name="persentase"  placeholder="Bobot">
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        </form>
                                    </div>
                                </h3>
                            </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tugas</th>
                                        <th>Target</th>
                                        <th>Persentase %</th>
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
                                        <td>{{ $d->tugas }}</td>
                                        <td>{{ $d->target }}</td>
                                        <td>{{ $d->persentase }}</td>
                                        <td>
                                            <form action="{{ route('target.destroy', $d->Id_Target) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('target.edit',[$d->Id_Target]) }}" class="btn btn-warning btn-sm">Edit</a>
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
