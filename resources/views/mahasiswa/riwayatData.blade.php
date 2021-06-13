@extends('layouts.main_app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Riwayat</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Riwayat</li>
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
                <h3 class="card-title">Proposal</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Nama Pengusul</th>
                        <th>Tahun</th>
                        <th>Progress</th>
                        <th>Aksi</th>


                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                         
                         @php
                            // $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                            $mhs = \App\Model\Mahasiswa::where('nim',$dt->id_ketua)->first();
                            $nilai = \App\Model\Nilai::where('id_usulan',$dt->id)->first();
                            $nlc = \App\Model\Nilai::where('id_usulan',$dt->id)->count();
                            $nim= Session::get('mh_username');
                          
                         @endphp   
                    <tr>
                        <td>{{$dt->judul}}</td>
                        <td>{{$mhs->nama}}</td>
                        

                        <td>
                            {{ $dt->tahun_usulan}} 
                        </td>

                        <td>
                            Unggah Proposal
                        </td>
                       
                        <td>
                           @if ($dt->status != 4)
                               <a href="{{url('/mahasiswa/daftar-usulan/unggah-proposal/edit/'.$dt->id.'')}}" class="badge badge-primary">ubah</a>
                           @else
                               <a href="{{url('/mahasiswa/daftar-usulan/unggah-proposal/review/'.$dt->id.'')}}" class="badge badge-info">review</a>

                           @endif
                        </td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>

                <br>
                <br>
                <br>
                {{-- bagian unggah rek --}}

                @php
                    $data_rek=\App\Model\UnggahRek::where('id_usulan',$dt->id)->get();
                @endphp
                <table id="data2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nama Pengusul</th>
                        <th>Progress</th>
                        <th>Aksi</th>


                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_rek as $dt)
                         
                         @php
                         
                          
                         @endphp   
                    <tr>
                        <td>{{$mhs->nama}}</td>

                        <td>
                            Unggah Rekening
                        </td>
                       
                        <td>
                           @if ($dt->status != 4)
                               <a href="{{url('/mahasiswa/rekening/edit/'.$dt->id.'')}}" class="badge badge-primary">ubah</a>
                           @else
                               <a href="{{url('/mahasiswa/rekening/review/'.$dt->id.'')}}" class="badge badge-info">review</a>

                           @endif
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
