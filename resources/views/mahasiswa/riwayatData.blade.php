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
    @foreach ($data as $dt)

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
                <table class="table table-bordered table-striped">
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
                         
                         @php
                            // $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                            $mhs = \App\Model\Mahasiswa::where('nim',$dt->id_ketua)->first();
                            $nilai = \App\Model\Nilai::where('id_usulan',$dt->id)->first();
                            $nlc = \App\Model\Nilai::where('id_usulan',$dt->id)->count();
                            $nim= Session::get('mh_username');

                    
                            $drc=\App\Model\UnggahRek::where('id_usulan',$dt->id)->count();
                            $dkc=\App\Model\Laporan::where('id_usulan',$dt->id)->where('jenis','1')->count();
                            $dac=\App\Model\Laporan::where('id_usulan',$dt->id)->where('jenis','2')->count();

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

                    </tbody>
                </table>

                <br>
                <br>
                <br>
                {{-- bagian unggah rek --}}

                @php
                    $data_rek=\App\Model\UnggahRek::where('id_usulan',$dt->id)->get();
                @endphp

                @if ($drc > 0)
                    
                <table  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Tanggal Unggah</th>
                        <th>Progress</th>
                        <th>Aksi</th>


                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_rek as $dr)
                         @endforeach
                         
                    <tr>
                        <td>{{ format_tanggal($dr->tgl )}}</td>

                        <td>
                            Unggah Rekening
                        </td>
                       
                        <td>
                           @if ($dt->status != 4)
                               <a href="{{url('/mahasiswa/rekening/edit/'.$dr->id_usulan.'')}}" class="badge badge-primary">ubah</a>
                           @else
                               <a href="{{url('/mahasiswa/rekening/review/'.$dr->id_usulan.'')}}" class="badge badge-info">review</a>
                           @endif
                        </td>

                    </tr>

                    </tbody>
                </table>
                @endif

                <br>
                <br>
                <br>

                {{-- bagian unggah kemajuan --}}
                @php
                 $dk=\App\Model\Laporan::where('id_usulan',$dt->id)->where('jenis','1')->first();
               @endphp

               @if ($dkc > 0)
                   
                  <table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>Tanggal Unggah</th>
                          <th>Progress</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      
                          
                         
                      <tr>
                          <td>{{ format_tanggal($dk->tgl_laporan )}}</td>

                          <td>
                              Unggah Laporan Kemajuan
                          </td>
                        
                          <td>
                            @if ($dt->status != 4)
                                <a href="{{url('/mahasiswa/kemajuan/edit/'.$dt->id.'')}}" class="badge badge-primary">ubah</a>
                            @else
                                <a href="{{url('/mahasiswa/kemajuan/review/'.$dt->id.'')}}" class="badge badge-info">review</a>

                            @endif
                          </td>

                      </tr>

                      </tbody>
                  </table>
                  @endif



                {{-- bagian unggah akhir --}}
                <br>
                <br>
                <br>
                @php
                $da=\App\Model\Laporan::where('id_usulan',$dt->id)->where('jenis','2')->first();
                @endphp
                @if ($dac > 0)
                    
                   <table class="table table-bordered table-striped">
                       <thead>
                       <tr>
                           <th>Tanggal Unggah</th>
                           <th>Progress</th>
                           <th>Aksi</th>
 
                       </tr>
                       </thead>
                       <tbody>
                          
                       <tr>
                           <td>{{ format_tanggal($da->tgl_laporan )}}</td>
 
                           <td>
                               Unggah Laporan Akhir
                           </td>
                         
                           <td>
                             @if ($dt->status != 4)
                                 <a href="{{url('/mahasiswa/akhir/edit/'.$da->id.'')}}" class="badge badge-primary">ubah</a>
                             @else
                                 <a href="{{url('/mahasiswa/akhir/review/'.$da->id.'')}}" class="badge badge-info">review</a>
 
                             @endif
                           </td>
 
                       </tr>
 
                       </tbody>
                   </table>
                   @endif

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
  
  @endforeach

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
</div>
<!-- ./wrapper -->
@endsection
