
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link">
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
                <a href="/admin/pasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/riwayatTerapiArt" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Terapi ART</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/pemeriksaanKlinis" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemeriksaan Klinis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/terapiArtPasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terapi ART</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/pengobatanTb" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengobatan TB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/followup/indexPasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Up Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/followup/index" class="nav-link">
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
                <a href="/admin/konselingHiv/indexPasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Up Konseling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/konselingHiv/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Konseling</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/checkHiv" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p> 
                Kegiatan Check HIV
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/sosialisasiHiv" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p> 
                Sosialisasi HIV
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/konselor" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p> Konselor 
              </p>
            </a>
          </li>
          <li class="nav-item menu-master">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/adherenceArt" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adherence ART</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/alasanSubstitusi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alasan Substitusi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/alasanTesHiv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alasan Tes HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/efekSamping" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Efek Samping</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/entryPoint" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entry Point</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/faktorResiko" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faktor Resiko</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/infeksiOportunistik" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Infeksi Oportunistik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/indikasiInisiasiArt" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Indikasi Inisiasi ART</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/infoTesHiv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Info Tes HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/jenisTerapi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Terapi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/kategoriManfaat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Manfaat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/kategoriPemeriksaan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Pemeriksaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/kelompokResiko" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelompok Resiko HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/klasifikasiTb" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Klasifikasi TB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/mitraSeksual" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mitra Seksual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/paduanArt" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paduan ART</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/paduanTb" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paduan TB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/pekerjaan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/pendidikan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/statusPernikahan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Pernikahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/statusFungsional" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Fungsional</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/statusHiv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/statusTb" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status TB</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/tempatTerapi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tempat Terapi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/tingkatResikoHiv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tingkat Resiko HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/tipeTb" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe TB</p>
                </a>
              </li>
            </ul>
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
                <a href="/admin/dashboard/index-pasien-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien Perbulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/index-pasien-tahunan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien Pertahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/index-pasien-hidup-mati" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien ODHA Berdasarkan Hidup Mati</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/index-pasien-penularan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien ODHA Berdasarkan Penularan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/index-pasien-umur" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien ODHA Berdasarkan Umur PerTahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/index-pasien-umur-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Pasien ODHA Berdasarkan Umur PerBulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/index-pasien-positif-persentase" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Persentase Pasien Positif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/konseling-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Konseling Perbulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/konseling-tahunan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grafik Konseling Pertahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/follow-up-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Up Perbulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/follow-up-tahunan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Follow Up Pertahun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/check-hiv-bulanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kegiatan Check HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dashboard/sosialisasi-hiv-bulanan" class="nav-link">
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
                <a href="/admin/download/sosialisasi-hiv" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Sosialisasi HIV 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/download/check-hiv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/download/konseling" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konseling HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/download/follow-up" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Folow Up HIV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/download/pasien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien</p>
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