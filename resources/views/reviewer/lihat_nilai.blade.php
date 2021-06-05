@extends('layouts.main_app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Formulir Penilaian</h3>
            <small>(menampilkan formulir penilaian usulan penelitian bantuan tugas akhir mahasiswa)</small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Proposal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Skor 1,2,3,4,5,6,7</h5>
            1 : Sangat Buruk, 2 : Buruk, 3 : Kurang, 4: Cukup, 5: Cukup Baik, 7 : Baik, 8: Sangat Baik
          </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="card">
            
            <div class="card-header">
                <div class="card-title">
                    Form Penilaian Bantuan Tugas Akhir Mahasiswa
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach ($data as $dt)
                        
                    @endforeach
                        <form  action="{{url('/reviewer/review-proposal/update')}}" method="post">
                           {{ csrf_field() }}
                          
                            <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th >Bobot</th>
                                    <th width="1%">Skor</th>
                                    <th width="1%">
                                        <p>Nilai</p>
                                        (Bobot x Skor)
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                        {{-- kreatifitas --}}
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>1</td>
                                        <td>
                                          <b>Kreatifitas :</b><br>
                                          a. Gagasan (Unik dan Bermanfaat)<br>
                                          b. Perumusan Masalah<br>
                                          c. Tujuan<br>
                                        
                                        </td>

                                        <td>20</td>

                                      
                                        <td><input type="number" name="skor_kreatif" id="skor_kreatif" max="8" value="{{$dt->skor_kreatif}}" required></td>
                                        <td>
                                            <input type="number" name="nilai_kreatif" id="nilai_kreatif" value="{{$dt->nilai_kreatif}}" required>

                                            <script>
                                                $('#skor_kreatif').on('keyup',function(){
                                                    var skor_kreatif =$this.val();

                                                });
                                            </script>

                                            @if($errors->has('nilai_kreatif'))
                                            <small class="text-muted text-danger">
                                                {{ $errors->first('nilai_kreatif')}}
                                                </small>
                                            @endif 
                                        </td>

                                    </tr>

                                      {{-- tinjauan pustaka --}}
                                      <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>2</td>
                                        <td>
                                          <b>Tinjauan Pustaka :</b><br>
                                          a. Relevansi<br>
                                          b. Kemutakhiran<br>
                                          c. Penyusunan Daftar Pustaka<br>
                                        </td>

                                        <td>25</td>

                                      
                                        <td><input type="number" name="skor_pustaka" max="8" value="{{$dt->skor_pustaka}}" required></td>

                                        <td>
                                            <input type="number" name="nilai_pustaka" value="{{$dt->nilai_pustaka}}" required>
                                            @if($errors->has('nilai_pustaka'))
                                            <small class="text-muted text-danger">
                                                {{ $errors->first('nilai_pustaka')}}
                                                </small>
                                            @endif 
                                        </td>

                                    </tr>
                                      {{-- Metode pelakasana --}}
                                      <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>3</td>
                                        <td>
                                          <b>Metode Pelaksanaan :</b><br>
                                          a. Ketepatan dan kesesuaian metode yang digunakan<br>
                                        </td>

                                        <td>10</td>

                                      
                                        <td><input type="number" name="skor_metode" max="8" value="{{$dt->skor_metode}}" required></td>

                                        <td>
                                            <input type="number" name="nilai_metode" value="{{$dt->nilai_metode}}" required>
                                            @if($errors->has('nilai_metode'))
                                            <small class="text-muted text-danger">
                                                {{ $errors->first('nilai_metode')}}
                                                </small>
                                            @endif 
                                        </td>

                                    </tr>
                                      {{-- Pleuangluaran --}}
                                      <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>4</td>
                                        <td>
                                          <b>Peluang Luaran Penelitian:</b><br>
                                            a. Publikasi Ilmiah<br>
                                            b. Model,Produk,atau Jasa yang berpotensi menghasilkan paten<br>
                                        </td>

                                        <td>25</td>
                                      
                                        <td><input type="number" name="skor_luaran" max="8" value="{{$dt->skor_luaran}}" required></td>

                                        <td>
                                            <input type="number" name="nilai_luaran" value="{{$dt->nilai_luaran}}" required>
                                            @if($errors->has('nilai_luaran'))
                                            <small class="text-muted text-danger">
                                                {{ $errors->first('nilai_luaran')}}
                                                </small>
                                            @endif 
                                        </td>

                                    </tr>
                                      {{-- jadwal --}}

                                      <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>5</td>
                                        <td>
                                          <b>Penjadwalan & Biaya :</b><br>
                                          a. Kesesuaian waktu,lengkap, & sesuai metode<br>
                                          b. Kesesuaian biaya,lengkap,rinci,wajar dan jelas peruntukanya<br>
                                        </td>

                                        <td>15</td>
                                      
                                        <td><input type="number" name="skor_jadwal" max="8" value="{{$dt->skor_jadwal}}" required></td>

                                        <td>
                                            <input type="number" name="nilai_jadwal" value="{{$dt->nilai_jadwal}}" required>
                                            @if($errors->has('nilai_jadwal'))
                                            <small class="text-muted text-danger">
                                                {{ $errors->first('nilai_jadwal')}}
                                                </small>
                                            @endif 
                                        </td>
                                    </tr>

                                    {{-- Jumlah --}}
                                    <tr>
                                       <td></td>

                                       <td>Jumlah</td>

                                       <td>100</td>
                                       <td></td>
                                       <td><input type="number" name="jumlah" value="{{$dt->jumlah}}"></td>

                                    </tr>

                                    {{-- komentar --}}
                                    <tr>
                                        <td></td>
                                        <td>Komentar</td>
                                        <td><textarea name="komentar" id="" cols="30" rows="3">{{$dt->komentar}}</textarea></td>
                                     </tr>

                                        {{-- komentar --}}
                                    <tr>
                                        @php
                                            $usl = \App\Model\Usulan::where('id',$dt->id_usulan)->first();
                                            $keg = \App\Model\KategoriBantuan::where('id',$usl->id_kategoriBantuan)->first();
                                        @endphp
                                        <td></td>
                                        <td>Dana yang disetujui <b>(max dana: Rp. {{number_format($keg->max_biaya)}})</b></td>
                                        <td><input type="number" name="dana_setuju" value="{{$dt->dana_setuju}}" max="{{$keg->max_biaya}}"></td>
                                     </tr>
                                     <input type="hidden" name="sumber" value="{{$dt->id}}">
                                </tbody>   
                            </table>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
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
