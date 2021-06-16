@extends('layouts.main_app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Riwayat Usulan</h3>
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
                <h3 class="card-title">Riwayat Proposal</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ketua</th>
                        <th>Jurusan</th>
                        <th>Program Studi</th>
                        <th>Judul</th>
                        <th>Rekomendasi Dana</th>
                        <th>Catatan</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($data as $dt)
                         
                         @php
                            $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                            $mhs = \App\Model\Mahasiswa::where('nim',$dt->id_ketua)->first();
                            $jur = \App\Model\Jurusan::where('id',$dt->id_jurusan)->first();
                            $pro = \App\Model\Prodi::where('id_jurusan',$dt->id_jurusan)->first();
                          
                         @endphp   
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$mhs->nama}}</td>

                        <td>{{$jur->nama}}</td>
                        <td>{{$pro->nama}}</td>

                        <td>
                          <a href="" data-toggle="modal" data-target="#detail-{{$dt->id}}">{{$dt->judul}}</a> 
                        </td>
                       
                        <td>Rp.{{number_format($dt->biaya)}}</td>
                      
                     
                      <td>{{status_catatan($dt->status)}}</td>
                      

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

  @foreach ($data as $dx)
    @php
          $mhsx = \App\Model\Mahasiswa::where('nim',$dx->id_ketua)->first();
          $uslx= \App\Model\Usulan::where('id',$dx->id)->first();                 
    @endphp
  {{-- modal detail --}}
  <div class="modal fade" id="detail-{{$dx->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Detail {{substr($uslx->judul, 0,60)}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="kategoriBantuan">Nama Ketua</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hands-helping"></i></span>
                  </div>
                  <input type="text" class="form-control" value="{{$mhsx->nama}}"  disabled>
                
                 </div>
            </div>

            <div class="form-group">
                <label for="kategoriBantuan">Judul</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-book" aria-hidden="true"></i></span>
                  </div>
                  <input type="text" class="form-control" value="{{$uslx->judul}}"  disabled>
                
                 </div>
            </div>

            @if ($uslx->nama_anggota1 != "")
                <div class="form-group">
                    <label for="kategoriBantuan">Anggota 1</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" value="{{$uslx->nama_anggota1}}"  disabled>
                    
                    </div>
                </div>
            @endif

            @if ($uslx->nama_anggota2 != "")
            <div class="form-group">
                <label for="kategoriBantuan">Anggota 2</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                  </div>
                  <input type="text" class="form-control" value="{{$uslx->nama_anggota2}}"  disabled>
                
                 </div>
            </div>
            @endif

            @if ($dx->status == 4)
            <div class="form-group">
              <label for="kategoriBantuan">Dana Final</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" value="Rp.{{number_format($uslx->biaya)}}"  disabled>
              
               </div>
          </div>
            @endif
           


        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  {{-- end detail --}}
  @endforeach
</div>
<!-- ./wrapper -->
@endsection
