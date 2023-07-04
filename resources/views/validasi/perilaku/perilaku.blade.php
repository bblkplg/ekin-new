
<div class="modal fade" id="modal-lg{{$perilakuhasil->id_perilaku}}">
    <div class="modal-dialog modal-xl">
    <div class="modal-content mb-3">
    <div class="modal-header">
    <h4 class="modal-title" style="color:black;">Penilaian Perilaku</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body"  >
        <form class="forms-sample" action="" method="POST">
            @csrf
            @method('put')
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th style="width:130px">Indikator</th>
                        <th style="width:400px;">Uraian Prilaku</th>
                        <th style="width:130px">Nilai</th>
                        <th style="width:90px">Bobot</th>
                        <th style="width:100px">Hasil</th>
                    </tr>
                    <tr>

                        <td>Keberadaan</td>
                        <td>
                            <p>Berada di lingkungan / di tempat kerja lebih dari 40 jam dalam <br> seminggu</p>
                        </td>
                        <td><input type="number" name="keberadaan" id="keberadaan" min="0" max="4" step=".01"
                                class="form-control " placeholder="0.00" value="{{$perilakuhasil->keberadaan ?? '0.00'}}" required=""></td>
                        <td>15%</td>
                        <td style="width:130px"><input type="text"  name="keberadaan_hasil" id="keberadan" class="form-control txt" value="{{(($perilakuhasil->keberadaan * 15)/100) ?? '0.00'}}" readonly></td>
                    </tr>
                    <tr>
                        <td>Inisiatif</td>
                        <td>
                            <p>Cepat mengenali masalah dan memprakarsai mengupayakan <br> tindakan dan saran
                                korektif</p>
                        </td>
                        <td><input type="number" name="inisiatif" id="inisiatif"  min="0" max="4" step=".01"
                                class="form-control " placeholder="0.00" required="" value="{{$perilakuhasil->inisiatif ?? '0.00'}}"></td>
                        <td>3%</td>
                        <td><input type="text"  name="inisiatif_hasil"  id="inisatif" class="form-control txt" value="{{(($perilakuhasil->inisiatif * 3)/100) ?? '0.00'}}"  readonly></td>
                    </tr>
                    <tr>
                        <td>Kehandalan</td>
                        <td>Tugas rutin selesai teoat waktu tanpa kesalahan</td>
                        <td><input type="number" name="kehandalan" id="kehandalan" min="0" max="4" step=".01"
                                class="form-control " placeholder="0.00" required="" value="{{$perilakuhasil->kehandalan ?? '0.00'}}"></td>
                        <td>3%</td>
                        <td><input type="text" name="kehandalan_hasil" id="khandalan" class="form-control txt" value="{{(($perilakuhasil->kehandalan * 3)/100) ?? '0.00'}}"  readonly></td>
                    </tr>
                    <tr>
                        <td>Kepatuhan</td>
                        <td>Taat pada aturan dan dapat memotivasi karyawan lain</td>
                        <td><input type="number" name="kepatuhan" id="kepatuhan" min="0" max="4" step=".01"
                                class="form-control" placeholder="0.00" required="" value="{{$perilakuhasil->kepatuhan ?? '0.00'}}"></td>
                        <td>3%</td>
                        <td><input type="text" name="kepatuhan_hasil" id="kpatuhan" class="form-control txt" value="{{(($perilakuhasil->kepatuhan * 3)/100) ?? '0.00'}}"  readonly></td>
                    </tr>
                    <tr>
                        <td>Kerjasama</td>
                        <td>
                            <p>Selalu siap dan sering memprakarsai kerjasama dan menerima <br> masukkan dan
                                kritik dengan baik</p>
                        </td>
                        <td><input type="number" id="kerjasama" name="kerjasama" min="0" max="4" step=".01"
                                class="form-control " placeholder="0.00" required="" value="{{$perilakuhasil->kerjasama ?? '0.00'}}"></td>
                        <td>3%</td>
                        <td><input type="text" name="kerjasama_hasil" id="krjasama" class="form-control txt" value="{{(($perilakuhasil->kerjasama * 3)/100) ?? '0.00'}}"  readonly></td>
                    </tr>
                    <tr>
                        <td>Sikap Prilaku</td>
                        <td>
                            <p> dengan tugasnya, senantiasa mau membantu mampu dan aktif <br> berkomunikasi
                                dengan pelanggan</p>
                        </td>
                        <td><input type="number" id="perilaku" name="perilaku" min="0" max="4" step=".01" class="form-control " placeholder="0.00" required="" value="{{$perilakuhasil->sikap ?? '0.00'}}"></td>
                        <td>3%</td>
                        <td><input type="text" name="perilaku_hasil" id="prilaku" class="form-control txt" value="{{(($perilakuhasil->sikap * 3)/100) ?? '0.00'}}" readonly></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="2">Jumlah Nilai Perilaku :</td>
                        @if ($perilakuhasil->hasil != NULL)
                        <td align="center"><span id="sum" ></span></td>

                        @else
                        <td align="center"><span id="sum" >{{$perilakuhasil->jumlah ?? '0.00'}}</span></td>

                        @endif
                        <input type="text" name="total" onchange="calculateSum()" id='total' hidden>
                        <td colspan="2">&nbsp;</td>

                    </tr>
                </table>
                <table>
                    <tbody>

                        <tr>
                            <td>Keterangan : </td>
                            <td> 91-81 = Istimewa</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> 81-90 = Diatas Harapan</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> 71-80 = Sesuai Harapan</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> 61-70 = Dibawah Harapan</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> 51-60 = Kurang</td>
                        </tr>
                    </tbody>
                    </table>
            </div>
    </div>
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Simpan</button>
    </div>
</div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
            var sum = 0;
            $(".txt").each(function() {
                $(this).keyup(function() {
                $("#total").keyup(function() {
                    //Kondisi Nan Value
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum += parseFloat(this.value);
                    }
                    var total = sum.val();
                    //.number format diblakang , 2
                    $("#total").html(total.toFixed(2));
                });
            });
                $("#perilaku").keyup(function() {
                    var perilaku = $("#perilaku").val();

                    if (!isNaN(this.value) && this.value.length != 0) {
                        var hitung_perilaku = parseInt(perilaku) * (('3') / 100);
                    }
                    calculateSum();
                    $("#prilaku").val(hitung_perilaku.toFixed(2));
                });
                $("#kerjasama").keyup(function() {
                    var kerjasama = $("#kerjasama").val();
                    calculateSum();
                    if (!isNaN(this.value) && this.value.length != 0) {
                        var hitung_perilaku = parseInt(kerjasama) * (('3') / 100);
                    }
                        $("#krjasama").val(hitung_perilaku.toFixed(2));
                    }); $("#kepatuhan").keyup(function() {
                        var kepatuhan = $("#kepatuhan").val();
                        calculateSum();
                        if (!isNaN(this.value) && this.value.length != 0) {
                            var hitung_perilaku = parseInt(kepatuhan) * (('3') / 100);
                        }
                        $("#kpatuhan").val(hitung_perilaku.toFixed(2));
                        }); $("#kehandalan").keyup(function() {
                        var kehandalan = $("#kehandalan").val();
                        calculateSum();
                        if (!isNaN(this.value) && this.value.length != 0) {
                            var hitung_perilaku = parseInt(kehandalan) * (('3') / 100);
                        }
                        $("#khandalan").val(hitung_perilaku.toFixed(2));
                    }); $("#inisiatif").keyup(function() {
                        var inisiatif = $("#inisiatif").val();
                        calculateSum();
                        if (!isNaN(this.value) && this.value.length != 0) {
                            var hitung_perilaku = parseInt(inisiatif) * (('3') / 100);
                        }
                        $("#inisatif").val(hitung_perilaku.toFixed(2));
                    }); $("#keberadaan").keyup(function() {
                        var keberadaan = $("#keberadaan").val();
                        calculateSum();
                        if (!isNaN(this.value) && this.value.length != 0) {
                            var hitung_perilaku = parseInt(keberadaan) * (('15') / 100);
                        }
                        $("#keberadan").val(hitung_perilaku.toFixed(2));

                    });
                });
            });
            function calculateSum() {
                var sum = 0;
                //Literasi Keyup
                $(".txt").each(function() {
                        //add only if the value is number
                        if (!isNaN(this.value) && this.value.length != 0) {
                            sum += parseFloat(this.value);
                        }
                        else if (this.value.length != 0){
                            $(this).css("background-color", "red");
                        }
                    });
                //.number format diblakang , 2
                // $("#total").val(sum.toFixed(2));
                $("#sum").html(sum.toFixed(2));
                $("#total").val(sum.toFixed(2));
            }
</script>
