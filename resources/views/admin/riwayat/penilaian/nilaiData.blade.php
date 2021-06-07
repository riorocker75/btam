@extends('layouts.main_app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Hasil Penilaian</h3>
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
                <h3 class="card-title">Hasil Penilaian Reviewer</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Pengusul</th>
                        <th>
                           Reviewer 1
                        </th>
                        <th>
                           Reviewer 2
                        </th>
                        <th>Total</th>

                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                         
                         @php
                             $no=1;
                            $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                            $mhs = \App\Model\Mahasiswa::where('nim',$dt->id_ketua)->first();

                            $nilai= \App\Model\Nilai::where('id_usulan',$dt->id)->get();
                            foreach ($nilai as $nl) {}
                            // reviewer 1
                            $rv1=\App\Model\Nilai::where('status','1')->first();
                            // reviewer 2
                            $rv2=\App\Model\Nilai::where('status','2')->first();
                           
                            if($count > 0){
                              $total =$rv1->jumlah + $rv2->jumlah / 2;
                            }
                           
                         @endphp   
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$kat->nama}}</td>

                        <td>{{$dt->judul}}</td>
                        <td>{{$mhs->nama}}</td>
                        <td>
                            @if ($rv1->jumlah != "")
                                 <a href="" data-toggle="modal" data-target="#rv1-{{$rv1->id}}{{$rv1->id_usulan}}">{{$rv1->jumlah}}</a>
                            @else
                                belum ada nilai
                            @endif
                        </td>
                        <td> 
                            @if ($rv2->jumlah != "")
                            <a href="" data-toggle="modal" data-target="#rv2-{{$rv2->id}}{{$rv2->id_usulan}}" >{{$rv2->jumlah}}</a>
                            @else
                                belum ada nilai
                            @endif
                        </td>
                        <td><b>{{$total}}</b></td>
                        <td>

                        </td>

                        <td>

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
    
  @php
    $count1 = \App\Model\Nilai::where('id_usulan',$dx->id)->count();
  @endphp
  @if ($count > 0)
    
  {{-- modal rv1 --}}
  <div class="modal fade" id="rv1-{{$rv1->id}}{{$rv1->id_usulan}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Penilaian Reviewer 1</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th >Kriteria Penilaian</th>
                    <th style="width: 15px">Bobot</th>
                    <th style="width: 15px">Skor</th>
                    <th style="width: 15px">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <b>Kreatifitas :</b><br>
                        a. Gagasan (Unik dan Bermanfaat)<br>
                        b. Perumusan Masalah<br>
                        c. Tujuan<br>
                    </td>
                    <td>25</td>
                    <td>{{$rv1->skor_kreatif}} </td>
                    <td>{{$rv1->nilai_kreatif}} </td>
                  </tr>
                  <tr>
                    <td>
                        <b>Tinjauan Pustaka :</b><br>
                        a. Relevansi<br>
                        b. Kemutakhiran<br>
                        c. Penyusunan Daftar Pustaka<br>
                    </td>
                    <td>20</td>
                    <td>{{$rv1->skor_pustaka}} </td>
                    <td>{{$rv1->nilai_pustaka}} </td>
                  </tr>
            
                  <tr>
                    <td>
                        <b>Metode Pelaksanaan :</b><br>
                        a. Ketepatan dan kesesuaian metode yang digunakan<br>
                    </td>
                    <td>10</td>
                    <td>{{$rv1->skor_metode}} </td>
                    <td>{{$rv1->nilai_metode}} </td>
                  </tr>
            
                  <tr>
                    <td>
                        <b>Peluang Luaran Penelitian:</b><br>
                        a. Publikasi Ilmiah<br>
                        b. Model,Produk,atau Jasa yang berpotensi menghasilkan paten<br>
                    </td>
                    <td>25</td>
                    <td>{{$rv1->skor_luaran}} </td>
                    <td>{{$rv1->nilai_luaran}} </td>
                  </tr>
            
                  <tr>
                    <td>
                        <b>Penjadwalan & Biaya :</b><br>
                        a. Kesesuaian waktu,lengkap, & sesuai metode<br>
                        b. Kesesuaian biaya,lengkap,rinci,wajar dan jelas peruntukanya<br>
            
                    </td>
                    <td>15</td>
                    <td>{{$rv1->skor_jadwal}} </td>
                    <td>{{$rv1->nilai_jadwal}} </td>
                  </tr>
              
                  <tr>
                      <td>
                          <b class="text-info">Total Skor</b><br>
                          <b>{{$rv1->jumlah}}</b>
                      </td>
                  </tr>
            
                  <tr>
                    <td>
                        <b class="text-info">Rekomendasi Dana</b><br>
                        <b>Rp.{{number_format($rv1->dana_setuju)}}</b>
                    </td>
                  </tr>
            
                  <tr>
                    <td>
                        <b class="text-info">Komentar</b><br>
                        <b>{{$rv1->komentar}}</b>
                    </td>
                  </tr>
            
                </tbody>
              </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  {{-- end modal rv1 --}}



{{-- modal rv2 --}}
<div class="modal fade" id="rv2-{{$rv2->id}}{{$rv2->id_usulan}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Penilaian Reviewer 2</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th >Kriteria Penilaian</th>
                    <th style="width: 15px">Bobot</th>
                    <th style="width: 15px">Skor</th>
                    <th style="width: 15px">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <b>Kreatifitas :</b><br>
                        a. Gagasan (Unik dan Bermanfaat)<br>
                        b. Perumusan Masalah<br>
                        c. Tujuan<br>
                    </td>
                    <td>25</td>
                    <td>{{$rv2->skor_kreatif}} </td>
                    <td>{{$rv2->nilai_kreatif}} </td>
                  </tr>
                  <tr>
                    <td>
                        <b>Tinjauan Pustaka :</b><br>
                        a. Relevansi<br>
                        b. Kemutakhiran<br>
                        c. Penyusunan Daftar Pustaka<br>
                    </td>
                    <td>20</td>
                    <td>{{$rv2->skor_pustaka}} </td>
                    <td>{{$rv2->nilai_pustaka}} </td>
                  </tr>

                  <tr>
                    <td>
                        <b>Metode Pelaksanaan :</b><br>
                        a. Ketepatan dan kesesuaian metode yang digunakan<br>
                    </td>
                    <td>10</td>
                    <td>{{$rv2->skor_metode}} </td>
                    <td>{{$rv2->nilai_metode}} </td>
                  </tr>

                  <tr>
                    <td>
                        <b>Peluang Luaran Penelitian:</b><br>
                        a. Publikasi Ilmiah<br>
                        b. Model,Produk,atau Jasa yang berpotensi menghasilkan paten<br>
                    </td>
                    <td>25</td>
                    <td>{{$rv2->skor_luaran}} </td>
                    <td>{{$rv2->nilai_luaran}} </td>
                  </tr>

                  <tr>
                    <td>
                        <b>Penjadwalan & Biaya :</b><br>
                        a. Kesesuaian waktu,lengkap, & sesuai metode<br>
                        b. Kesesuaian biaya,lengkap,rinci,wajar dan jelas peruntukanya<br>

                    </td>
                    <td>15</td>
                    <td>{{$rv2->skor_jadwal}} </td>
                    <td>{{$rv2->nilai_jadwal}} </td>
                  </tr>
              
                  <tr>
                      <td>
                          <b class="text-info">Total Skor</b><br>
                          <b>{{$rv2->jumlah}}</b>
                      </td>
                  </tr>

                  <tr>
                    <td>
                        <b class="text-info">Rekomendasi Dana</b><br>
                        <b>Rp.{{number_format($rv2->dana_setuju)}}</b>
                    </td>
                  </tr>

                  <tr>
                    <td>
                        <b class="text-info">Komentar</b><br>
                        <b>{{$rv2->komentar}}</b>
                    </td>
                  </tr>

                </tbody>
              </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  {{-- end modal rv2 --}}
  @endif
  @endforeach

  
</div>
<!-- ./wrapper -->
@endsection
