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
        <div class="card">
            
            <div class="card-header">
                <h3 class="card-title">Usulan Terkini</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Nama Pengusul</th>
                        <th>Biaya</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>

                        <th width="15%">Progress</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                         
                         @php
                            $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                            $mhs = \App\Model\Mahasiswa::where('nim',$dt->id_ketua)->first();
                         @endphp   
                    <tr>
                        <td>{{$dt->judul}}</td>
                        <td>{{$mhs->nama}}</td>
                        <td>
                          <b> {{ number_format($dt->biaya)}}<br></b>
                        </td>

                        <td>
                            {{ $dt->tahun_usulan}} 
                        </td>
                      
                        <td>
                           <label class="badge badge-primary">{{ status_usulan($dt->status)}} </label> 
                        </td>

                        <td>
                          <label class="badge badge-default"> <p>Menunggu persetujuan...</p> </label>
                          {{-- buat logika jika dia sudah status didanai tamplikan tobol ini --}}
                          <p> <a href="{{ url('/mahasiswa/daftar-usulan/unggah-rekening/'.$dt->id.'')}}" class="btn btn-block btn-outline-primary btn-sm">Unggah Data Rekening</a></p>
                          <p> <a href="{{ url('/mahasiswa/daftar-usulan/unggah-kemajuan/'.$dt->id.'')}}" class="btn btn-block btn-outline-primary btn-sm">Unggah Laporan Kemajuan</a></p>
                          <p> <a href="{{ url('/mahasiswa/daftar-usulan/unggah-akhir/'.$dt->id.'')}}" class="btn btn-block btn-outline-primary btn-sm">Unggah Laporan Akhir</a></p>

     
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
