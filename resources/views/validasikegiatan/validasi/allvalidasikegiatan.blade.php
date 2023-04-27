<style>
    .identitas {
  padding: 15px;
  border: 0.5px solid black;
}

input[type="radio"] {
        -ms-transform: scale(1.5);
        /* IE 9 */
        -webkit-transform: scale(1.5);
        /* Chrome, Safari, Opera */
        transform: scale(1.5);
    }
</style>

<div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content mb-3">
    <div class="modal-header">
    <h4 class="modal-title" style="color:black;">Data Kegiatan</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form class="forms-sample" action="{{route('updateverifall', $d->nama)}}" method="POST">
            @csrf
            @method('put')
            <div class="table-responsive">
                <label for="exampleInputName1">
                    <h5>Status</h5>
                </label>
                <div class="container">
                    <div class="row ">
                        <div class="col identitas">
                            {{ $pegawai->nama }}
                        </div>
                        @php
                            if ($d->kepala_instalasi == "Telah Disetujui") {
                                $bandage = 'badge badge-pill badge-success';
                                $kepala_instalasi = 'Telah Disetujui';
                            } elseif ($d->kepala_instalasi == "Belum Disetujui") {
                                $bandage = 'badge badge-pill badge-warning';
                                $kepala_instalasi = 'Tidak Disetujui';
                            } else {
                                $bandage = 'badge badge-pill badge-warning';
                                $kepala_instalasi = 'Tidak Disetujui';
                            }
                        @endphp
                        <div class="col identitas">
                             <span class='{{$bandage}}'>{{$d->kepala_instalasi }}</span>
                        </div>
                    </div>
                </div>
                <br>
                    <label><h5>Verifikasi Target</h5></label>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label class="form-radio-label ">
                                  <input type="radio" name="kepala_instalasi" value="Telah Disetujui"
                                  {{ $d->kepala_instalasi == "Telah Disetujui" ? 'checked' : '' }} >&nbsp;&nbsp;<h6 class='badge badge-pill badge-success' style="font-size:15px;  color:rgb(255, 255, 255);">Telah Disetujui</h6>
                                </label>
                            </div>
                            <div class="col ms-auto">
                             <label class="form-radio-label">
                               <input type="radio" name="kepala_instalasi" value="Belum Disetujui"
                               {{ $d->kepala_instalasi == "Belum Disetujui" ? 'checked' : '' }} >&nbsp;&nbsp; <h6 class='badge badge-pill badge-warning' style="font-size:15px; color:rgb(255, 255, 255);"> Belum Disetujui</h6>
                             </label>
                         </div>
                    <br>
                         </div>
                    </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
          </form>
        </div>
    </div>

</div>
</div>
</div>

