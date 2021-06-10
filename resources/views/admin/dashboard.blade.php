@extends('layouts.main_app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Dashboard</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Daftar Reviewer</span>
                <span class="info-box-number">
                  @php
                      $rv = \App\Model\Dosen::where('lvl',3)->count();
                      $ds = \App\Model\Dosen::where('lvl',1)->count();
                  @endphp
                 
                  <b>{{ $rv}}</b>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Daftar Dosen</span>
                <span class="info-box-number">{{ $ds}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-info-circle"></i></span>
              @php
                  $bt=\App\Model\KategoriBantuan::count();
              @endphp
              <div class="info-box-content">
                <span class="info-box-text">Daftar Bantuan</span>
                <span class="info-box-number">{{$bt}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-university"></i></span>
              @php
                  $jr=\App\Model\Jurusan::count();
              @endphp
              <div class="info-box-content">
                <span class="info-box-text">Daftar Jurusan</span>
                <span class="info-box-number">{{$jr}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Partisipan Kegiatan BTAM</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4 col-6">
                    @php
                        $d3= \App\Model\Usulan::where('jenjang','D3')->count();
                        $d4= \App\Model\Usulan::where('jenjang','D4')->count();
                        $s2= \App\Model\Usulan::where('jenjang','S2')->count();

                    @endphp
                    <div class="description-block border-right">
                      <span class="description-percentage text-success">PENDIDIKAN D3</span>
                      <h5 class="description-header">{{ $d3}}</h5>
                      <span class="description-text">TOTAL PENGUSUL TUGAS AKHIR</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning">PENDIDIKAN D4</span>
                      <h5 class="description-header">{{ $d4 }}</h5>
                      <span class="description-text">TOTAL PENGUSUL SKRIPSI</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 col-6">
                    <div class="description-block" >
                      <span class="description-percentage text-danger">PENDIDIKAN S2</span>
                      <h5 class="description-header">{{ $s2 }}</h5>
                      <span class="description-text">TOTAL PENGUSUL TESIS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
</div>
<!-- ./wrapper -->
@endsection
