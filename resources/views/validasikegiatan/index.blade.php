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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Data Kegiatan
                                </h3>
                            </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th>Nama</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $key => $d)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>
                                            {{-- <form action="{{ route('target.destroy', $d->Id_Target) }}" method="post">
                                                @csrf
                                                @method('DELETE') --}}
                                                <a href="{{ route('datakegiatan', $d->nama) }}" class="btn btn-warning btn-sm">Verifikasi Kegiatan</a>
                                                {{-- <button class="btn btn-danger btn-sm">Kegiatan</button> --}}
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section>
</div>

@endsection
