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
                            // $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
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
                          @if ($dt->status  == 1)
                            <label class="badge badge-default"> <p>Menunggu persetujuan...</p> </label>
                          @endif

                          @if ($dt->status  == 5)
                            <label class="badge badge-danger"> <p>Permohonan Anda Di Tolak</p> </label>
                           @endif
                          {{-- buat logika jika dia sudah status didanai tamplikan tobol ini --}}
                            {{-- cek tanggal dulu baru aksi status --}}
                            @php
                                 $waktu=date("Y-m-d");
                                $jad= \App\Model\JadwalKegiatan::where('id','1')->first();
                                $jad_proposal= date("Y-m-d", strtotime($jad->deadline_proposal));
                                $jad_rek= date("Y-m-d", strtotime($jad->deadline_rek));
                                $jad_maju= date("Y-m-d", strtotime($jad->deadline_kemajuan));
                                $jad_akhir= date("Y-m-d", strtotime($jad->deadline_akhir));

                            @endphp
                                {{-- {{ $jad_proposal}} --}}

                            @if ($waktu > $jad_proposal)
                              @if ($waktu < $jad_rek )
                                  @if($dt->status_rek != '2')
                                  <p> <a href="{{ url('/mahasiswa/daftar-usulan/unggah-rekening/'.$dt->id.'')}}" class="btn btn-block btn-outline-primary btn-sm">Unggah Data Rekening</a></p>
                                  @endif
                              @endif
                            @endif

                            @if ($waktu > $jad_rek)
                              @if ($waktu < $jad_maju )
                                  @if($dt->status_kemajuan != '2')
                                    <p> <a href="{{ url('/mahasiswa/daftar-usulan/unggah-kemajuan/'.$dt->id.'')}}" class="btn btn-block btn-outline-primary btn-sm">Unggah Laporan Kemajuan</a></p>
                                  @endif
                               @endif

                           @endif

                           @if ($waktu > $jad_maju)
                               @if ($waktu < $jad_akhir )
                                  @if($dt->status_akhir != '2')
                                  <p> <a href="{{ url('/mahasiswa/daftar-usulan/unggah-akhir/'.$dt->id.'')}}" class="btn btn-block btn-outline-primary btn-sm">Unggah Laporan Akhir</a></p>
                                  @endif
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

  
</div>
<!-- ./wrapper -->
@endsection
