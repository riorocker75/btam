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
              <li class="breadcrumb-item active">Daftar Proposal</li>
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
                <h3 class="card-title">Daftar Proposal</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Pengusul</th>
                        <th>Proposal</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no=1?>
                        @foreach ($data as $dt)
                         
                         @php
                            $usl = \App\Model\Usulan::where('id',$dt->id_usulan)->first();
                            $kat = \App\Model\KategoriBantuan::where('id',$usl->id_kategoriBantuan)->first();
                            $mhs = \App\Model\Mahasiswa::where('nim',$usl->id_ketua)->first();
                         @endphp  

                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$kat->nama}}</td>
                            {{-- <td><a href="{{url('/reviewer/detal-proposal/'.$usl->id.'')}}">{{$usl->judul}}</a></td> --}}
                            <td><a href="" data-toggle="modal" data-target="#detail-{{$usl->id}}">{{$usl->judul}}</a></td>

                            <td>{{$mhs->nama}}</td>
                            <td>{{preview_proposal($usl->berkas_proposal)}}</td>
                            <td>
                              @if ($dt->status_dana != "")
                                 <label class="badge badge-secondary">Telah Berakhir</label>
                              @else
                                  @if ($dt->jumlah != "")
                                    <a href="{{url('/reviewer/lihat-nilai/'.$dt->id.'')}}" class="badge badge-warning">Ubah</a>
                                  @else
                                    <a href="{{url('/reviewer/review-proposal/'.$dt->id.'')}}" class="badge badge-danger">Review</a>
                                  @endif
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

  
@foreach ($data as $dx)
    
  {{-- modal detail --}}
  <div class="modal fade" id="detail-{{$usl->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Detail {{substr($usl->judul, 0,60)}}</h4>
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
                  <input type="text" class="form-control" value="{{$mhs->nama}}"  disabled>
                
                 </div>
            </div>

            <div class="form-group">
                <label for="kategoriBantuan">Judul</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-book" aria-hidden="true"></i></span>
                  </div>
                  <input type="text" class="form-control" value="{{$usl->judul}}"  disabled>
                
                 </div>
            </div>

            @if ($usl->nama_anggota1 != "")
                <div class="form-group">
                    <label for="kategoriBantuan">Anggota 1</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" value="{{$usl->nama_anggota1}}"  disabled>
                    
                    </div>
                </div>
            @endif

            @if ($usl->nama_anggota2 != "")
            <div class="form-group">
                <label for="kategoriBantuan">Anggota 2</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                  </div>
                  <input type="text" class="form-control" value="{{$usl->nama_anggota2}}"  disabled>
                
                 </div>
            </div>
            @endif

            <div class="form-group">
                <label for="kategoriBantuan">Biaya Pengajuan</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                  </div>
                  <input type="text" class="form-control" value="Rp.{{number_format($usl->biaya)}}"  disabled>
                
                 </div>
            </div>


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
