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
    Periode
    <div class="container-fluid">
      <form class="form-inline" action="{{ route('periode') }}" method="POST">
        @csrf
        <label for="inlineFormEmail" class="m-2">Bulan</label>
        {{-- <select class="form-control m-2" id="inlineFormEmail" name="bulan">
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
        </select> --}}
        <label for="inlineFormPassword" class="m-2">Tahun</label>
        <select class="form-control m-2" id="inlineFormEmail" name="tahun">
          @php
            $year = date('Y');
          @endphp
          {{-- @for ($i=2020; $i<=$year; $i++)
            <option value="{{ $i }}" @if ($periode->tahun == $i) {{ 'selected' }} @endif>{{ $i }}</option>
          @endfor --}}
        </select>
        <button type="submit" class="btn btn-primary m-2">Submit</button>
      </form>
    </div>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>

      </li>
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
