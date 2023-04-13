@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kualitas</h1>
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
    <div class="container-fluid">
        <div class="row flex-grow">
            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                <div class="card bg-primary card-rounded">
                    <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-4"></h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 class="text-white mb-3"><b>{{'Pegawai'}} </b><br></h5>
                                <h5 class="text-white mb-2">{{ $pegawai->nama }} <br></h5>
                                <h5 class="text-white mb-2">{{ $pegawai->jabatan }}<br/></h5>
                                <h5 class="text-white mb-2">{{ $pegawai->instalasi }} <br></h5>
                                <p  style="color:rgb(0, 255, 123)">{{$periode->bulan}}</p>
                                <h2  style="color:rgb(0, 255, 157)">{{$periode->tahun}}</h2>
                            </div>
                            <div class="col-sm-4">
                                        <h5 class="text-white mb-3"><b>{{'Atasan 1'}} </b><br></h5>
                                        <h5 class="text-white mb-4">{{ $pegawai->atasan1 }}</h5>
                            </div>
                            @if ( $pegawai->atasan2 != '')
                            <div class="col-sm-4">
                                <h5 class="text-white mb-3"><b>{{'Atasan 2'}} </b><br></h5>
                                <h5 class="text-white mb-4">{{ $pegawai->atasan2 }}</h5>

                            </div>
                            @endif
                        </div>
                        <hr>
                        <p class="text-white mb-4">Informasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <form class="forms-sample" action="{{route('kegiatan.store')}}" method="POST">
                                    @csrf
                                      <div class="form-row">
                                          <div class="col-md-4 mb-3">
                                              <select class="form-control" name="tugas" width='100'>
                                                  <option selected disabled>Pilih inidikator pegawai yang dinilai</option>
                                                  {{-- @foreach ($target as $i)
                                                      <option value="{{ $i->tugas }}">{{ $i->tugas }}</option>
                                                  @endforeach --}}
                                              </select>
                                          </div>
                                          <div class="col-md-3 mb-6">
                                            <select class="form-control" name="tugas" width='100'>
                                                <option selected disabled>Pilih inidikator pegawai yang dinilai</option>
                                                {{-- @foreach ($target as $i)
                                                    <option value="{{ $i->tugas }}">{{ $i->tugas }}</option>
                                                @endforeach --}}
                                            </select>
                                          </div>
                                          <div class="col-sm-1">

                                              <input type="number" class="form-control" name="tanggal" placeholder="Tanggal">
                                          </div>
                                          <div class="col-sm-2">
                                              <input type="number" class="form-control" name="noorder" placeholder="Order">
                                          </div>
                                          <div class="col-sm-1">
                                              <input type="number" class="form-control" name="mulai"  placeholder="Jumlah">
                                          </div>
                                          <div class="col-sm-1">
                                                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                                              </form>
                                          </div>
                                      </div>
                               </h3>
                          </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Indikator Nilai</th>
                                        <th>Definisi</th>
                                        <th>Target</th>
                                        <th width="9%">Bobot %</th>
                                        <th>Capaian</th>
                                        <th>Hasil</th>
                                        <th width="12%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total=0; ?>
                                    @foreach ($kualitas as $key => $data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->indikator ?? '-'  }}</td>
                                        <td>{{ $data->definisi ?? '-'  }}</td>
                                        <td><center>{{ $data->target ?? '0' }}</center></td>
                                        <td><center>{{ $data->bobot ?? '0'  }}</center></td>
                                        <td>{{ $data->capaian ?? '0.00'  }}</td>
                                        <td>{{number_format($data->hasil ?? '0.00', 2) }}</td>
                                        <?php $total += $data->hasil ?>

                                        <td>
                                         <form action="" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="" class="btn btn-warning btn-sm">Edit</a>
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
            <div class="alert alert-info" style="background-color: #8dedef;">

                <div class="container">
                    <br>
                    <h4 style="color:black"><i class='fas fa-file-alt' style="color:black"></i>  <b>Nilai Kualitas</b></h4>
                    <br>
                    <table id="order-listing" class="table">
                        <tbody>



                            <tr>
                                <td colspan="5" style="background-color: #29dee1; color:black">
                                    <center><h6><b>Total Kualitas Individu</b></h6></center>

                                </td>


                                <td style="background-color: #1e5896; " align="center">{{number_format($total ?? '0.00', 2) }}</td>

                            <tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>

    </section>
    <br>

</div>
@endsection
