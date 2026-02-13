
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
    <a href="/konselor/home" class="brand-link">
      <img src="{{asset('ham/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HAM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('alte/dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-master">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Pasien
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/konselor/pasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/riwayatTerapiArt/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Terapi ART</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/pemeriksaanKlinis/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemeriksaan Klinis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/terapiArtPasien/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terapi ART</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/pengobatanTb/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengobatan TB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/followup/indexPasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Up Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/followup/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Follow Up Terapi</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item menu-master">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>Konseling
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/konselor/konselingHiv/indexPasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Up Konseling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/konselingHiv/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Konseling</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/konselor/checkHiv/index" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p> 
                Kegiatan Check HIV
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/konselor/sosialisasiHiv/index" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p> 
                Sosialisasi HIV
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/konselor/konselor/index" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p> Konselor 
              </p>
            </a>
          </li>
          <li class="nav-item menu-master">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Data Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/konselor/dashboard/index-pasien-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien Perbulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/index-pasien-hidup-mati" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien ODHA Berdasarkan Hidup Mati</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/index-pasien-penularan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien ODHA Berdasarkan Penularan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/index-pasien-umur" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien ODHA Berdasarkan Umur PerTahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/index-pasien-umur-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien ODHA Berdasarkan Umur PerBulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/index-pasien-tahunan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien Pertahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/index-pasien-positif-persentase" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Persentase Pasien Positif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/konseling-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Konseling Perbulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/konseling-tahunan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Konseling Pertahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/follow-up-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Up Perbulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/follow-up-tahunan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Up Pertahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/check-hiv-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kegiatan Check HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/dashboard/sosialisasi-hiv-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sosialisasi HIV</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item menu-master">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>Download Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/konselor/download/sosialisasi-hiv" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Sosialisasi HIV 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/konselor/download/check-hiv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check HIV</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
  </script>