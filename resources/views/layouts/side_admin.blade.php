<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('asset/img/pnj.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">BTAM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('asset/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
       
        <a href="#" class="d-block">{{Session::get('nama')}}</a>

      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{url('/')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/kategori-bantuan')}}" class="nav-link">
            <i class="nav-icon fas fa-hands-helping"></i>
            <p>Daftar Bantuan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/admin/jadwal-kegiatan')}}" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Jadwal Kegiatan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/admin/daftar-jurusan')}}"  class="nav-link">
            <i class="nav-icon fas fa-university"></i>
            <p>Daftar Jurusan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/admin/daftar-prodi')}}" class="nav-link">
            <i class="nav-icon fas fa-chalkboard"></i>
            <p>Daftar Program Studi</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-user-clock"></i>
            <p>
              Penugasan Reviewer
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/admin/penugasan-reviewer/')}}"  class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Penugasan Reviewer</p>
              </a>
            </li>
          
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Daftar Pengguna
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('admin/pengguna/dosen')}}"class="nav-link  active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/pengguna/reviewer')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reviewer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/pengguna/mahasiswa')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengusul</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{url('/admin/hasil-penilaian')}}" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Hasil Penilaian
            </p>
          </a>
          
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Riwayat Usulan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/admin/riwayat/data-proposal')}}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Tahap Awal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/riwayat/data-kemajuan')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Kemajuan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/riwayat/data-akhir')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Akhir</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Pencairan Dana
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('pencairan_dana/daftar_bank')}}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Bank</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/riwayat/data-rekening')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Rekening</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{url('/admin/panduan')}}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Panduan
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>