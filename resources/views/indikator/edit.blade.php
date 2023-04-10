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
                                Edit Data Indikator
                            </h3>
                        </div>
                        <div class="card-body">
                       
                            <form method="POST" action="{{ route('indikator.update',[$indikator->idindikator]) }}">
                                @csrf
                                @method('PUT');
                                    <div class="form-group">
                                        <label>Indikator</label>
                                        <input type="text" class="form-control" name="indikator" value="{{ $indikator->indikator }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Instalasi</label>
                                        <select class="form-control" name="instalasi">
                                            @foreach ($instalasi as $data)
                                                <option value="{{ $data->instalasi }}" @if ($data->instalasi == $indikator->instalasi) {{'selected'}} @endif>{{ $data->instalasi }}</option>  
                                            @endforeach
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
