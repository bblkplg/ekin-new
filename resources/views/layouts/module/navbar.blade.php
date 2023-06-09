<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  @php
    $periode = json_decode(request()->cookie('ekin-periode'));
    $periode = $periode != '' ? $periode:[];
  @endphp
    <div class="container-fluid">
      <form class="form-inline" action="{{ route('periode') }}" method="POST">
        @csrf


        <form>
            <div class="form-row">
              <div class="col">
                @if (isset($periode->bulan) && $periode->bulan != '')
                <select class="form-control m-2" id="inlineFormEmail" name="bulan">
                  <option value="Januari" @if ($periode->bulan == "Januari") {{ 'selected' }} @endif>Januari</option>
                  <option value="Februari" @if ($periode->bulan == "Februari") {{ 'selected' }} @endif>Februari</option>
                  <option value="Maret" @if ($periode->bulan == "Maret") {{ 'selected' }} @endif>Maret</option>
                  <option value="April" @if ($periode->bulan == "April") {{ 'selected' }} @endif>April</option>
                  <option value="Mei" @if ($periode->bulan == "Mei") {{ 'selected' }} @endif>Mei</option>
                  <option value="Juni" @if ($periode->bulan == "Juni") {{ 'selected' }} @endif>Juni</option>
                  <option value="Juli" @if ($periode->bulan == "Juli") {{ 'selected' }} @endif>Juli</option>
                  <option value="Agustus" @if ($periode->bulan == "Agustus") {{ 'selected' }} @endif>Agustus</option>
                  <option value="September" @if ($periode->bulan == "September") {{ 'selected' }} @endif>September</option>
                  <option value="Oktober" @if ($periode->bulan == "Oktober") {{ 'selected' }} @endif>Oktober</option>
                  <option value="November" @if ($periode->bulan == "November") {{ 'selected' }} @endif>November</option>
                  <option value="Desember" @if ($periode->bulan == "Desember") {{ 'selected' }} @endif>Desember</option>
                </select>
                @else
                <select class="form-control m-2" id="inlineFormEmail" name="bulan">
                  <option>Bulan</option>
                  <option value="Januari" >Januari</option>
                  <option value="Februari">Februari</option>
                  <option value="Maret" >Maret</option>
                  <option value="April">April</option>
                  <option value="Mei">Mei</option>
                  <option value="Juni">Juni</option>
                  <option value="Juli">Juli</option>
                  <option value="Agustus">Agustus</option>
                  <option value="September">September</option>
                  <option value="Oktober">Oktober</option>
                  <option value="November">November</option>
                  <option value="Desember">Desember</option>
                </select>
                @endif


              </div>
              <div class="col">
                @if (isset($periode->tahun) && $periode->tahun != '')
                <select class="form-control m-2" id="inlineFormEmail" name="tahun">
                @php
                    $year = date('Y');
                @endphp
                @for ($i=2018; $i<=$year; $i++)
                    <option value="{{ $i }}" @if ($periode->tahun == $i) {{ 'selected' }} @endif>{{ $i }}</option>
                @endfor
                </select>
            @else
                <select class="form-control m-2" id="inlineFormEmail" name="tahun">
                    <option>Tahun</option>
                    @php
                      $year = date('Y');
                    @endphp
                    @for ($i=2018; $i<=$year; $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                @endif
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary m-2">Priode</button>
            </div>
          </div>
        </form>
    </div>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
