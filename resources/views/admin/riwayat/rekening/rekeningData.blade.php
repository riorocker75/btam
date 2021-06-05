@extends('layouts.main_app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Pencairan Dana</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pencarian Dana</li>
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
        <div class="card">
            
            <div class="card-header">
                <h3 class="card-title">Daftar Rekening</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Jenjang Pendidikan</th>
                        <th>Tahun</th>

                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                         
                         @php
                             $no=1;
                            $usl= \App\Model\Usulan::where('id',$dt->id_usulan)->first();
                            $kat = \App\Model\KategoriBantuan::where('id', $usl->id_kategoriBantuan)->first();
                            $mhs = \App\Model\Mahasiswa::where('nim',$usl->id_ketua)->first();

                         @endphp   
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$mhs->nim}}</td>
                        <td>{{$mhs->nama}}</td>

                        <td>{{$usl->judul}}</td>
                        <td>{{$mhs->jenjang}} </td>
                        <td>
                            {{ $usl->tahun_usulan}} 
                        </td>
                        <td>
                            <a href="{{url('/admin/riwayat/detail/data-rekening/'.$dt->id.'')}}" class="badge badge-danger">Detail</a>
                        </td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
     
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
