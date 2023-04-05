<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <div class="container-fluid">
      <form class="form-inline">
        <label for="inlineFormEmail" class="m-2">Bulan</label>
        <select class="form-control m-2" id="inlineFormEmail" name="bulan">
          <option value="Januari">Januari</option>
          <option value="Februari">Februari</option>
          <option value="Maret">Maret</option>
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
        <label for="inlineFormPassword" class="m-2">Tahun</label>
        <select class="form-control m-2" id="inlineFormEmail" name="tahun">
          @php
            $year = date('Y');
          @endphp
          @for ($i=2020; $i<=$year; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
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