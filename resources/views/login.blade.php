<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ekinerja | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href=" {{ asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href=" {{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
</head>
<style>
    body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-image: linear-gradient(to right, #00a2f9, #4f09da);
    background-repeat: no-repeat;
}

input, textarea {
    background-color: #F3E5F5;
    border-radius: 50px !important;
    padding: 12px 15px 12px 15px !important;
    width: 100%;
    box-sizing: border-box;
    border: none !important;
    border: 1px solid #F3E5F5 !important;
    font-size: 16px !important;
    color: #000 !important;
    font-weight: 400;
}

input:focus, textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #D500F9 !important;
    outline-width: 0;
    font-weight: 400;
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0;
}

.card {
    border-radius: 0;
    border: none;
}

.card1 {
    width: 50%;
    padding: 40px 30px 10px 30px;
}

.card2 {
    width: 50%;
    background-image: linear-gradient(to right, #4f4fff, #2ebbe6);
}

#logo {
    width: 70px;
    height: 60px;
}

.heading {
    margin-bottom: 60px !important;
}

::placeholder {
    color: #000 !important;
    opacity: 1;
}

:-ms-input-placeholder {
    color: #000 !important;
}

::-ms-input-placeholder {
    color: #000 !important;
}

.form-control-label {
    font-size: 12px;
    margin-left: 15px;
}

.msg-info {
    padding-left: 15px;
    margin-bottom: 30px;
}

.btn-color {
    border-radius: 50px;
    color: #fff;
    background-image: linear-gradient(to right, #4730f9, #3befff);
    padding: 15px;
    cursor: pointer;
    border: none !important;
    margin-top: 40px;
}

.btn-color:hover {
    color: #fff;
    background-image: linear-gradient(to right, #5194ff, #1ff0ff);
}

.btn-white {
    border-radius: 50px;
    color: #6154f4;
    background-color: #fff;
    padding: 8px 40px;
    cursor: pointer;
    border: 2px solid #2d24cf !important;
}

.btn-white:hover {
    color: #fff;
    background-image: linear-gradient(to right, #2c65eb, #0eeae6);
}

a {
    color: #000;
}

a:hover {
    color: #000;
}

.bottom {
    width: 100%;
    margin-top: 50px !important;
}

.sm-text {
    font-size: 15px;
}

@media screen and (max-width: 992px) {
    .card1 {
        width: 100%;
        padding: 40px 30px 10px 30px;
    }

    .card2 {
        width: 100%;
    }

    .right {
        margin-top: 100px !important;
        margin-bottom: 100px !important;
    }
}

@media screen and (max-width: 768px) {
    .container {
        padding: 10px !important;
    }

    .card2 {
        padding: 50px;
    }

    .right {
        margin-top: 50px !important;
        margin-bottom: 50px !important;
    }
}
</style>
<div class="container px-4 py-5 mx-auto">
    <div class="card card0">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-10 col-10 my-5">
                        <div class="row justify-content-center px-3 mb-3">
                            <img id="logo" src="{{ asset('images/bblk__2_-removebg-preview.png') }}"  width="500" height="800">
                        </div>
                        <h6 class="mb-4 text-center heading">Kementrian Kesehatan RI <br> Balai Besar Laboratorium Kesehatan Palembang</h6>
                        <form action="/dologin" method="post">
                            @csrf
                        <div class="form-group">
                            <label class="form-control-label text-muted">Username</label>
                            <select class="form-control select2" name="nama">
                                @foreach ($datapegawai as $d)
                                  <option value="{{$d->nama}}">{{$d->nama}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label text-muted">Password</label>
                            <input type="password" class="form-control" @error('password') is-invalid @enderror name='password' placeholder="Password" required>
                        </div>

                        <div class="row justify-content-center my-3 px-3">
                            <button class="btn-block btn-color">Login</button>
                        </div>
                    </form>

                        <div class="row justify-content-center my-2">
                            <small class="text-muted">Jika tidak bisa login, silahkan hubungi IT</small></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card2">
                <div class="my-auto mx-md-5 px-md-5 right">
                    <h3 class="text-white"><center>Aplikasi Ekinerja Pegawai BBLK Palembang</center></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
