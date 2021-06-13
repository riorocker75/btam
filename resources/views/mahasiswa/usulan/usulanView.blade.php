@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Review Proposal</h4>
            </div><!-- /.col -->
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Review Proposal</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Ubah</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach ($data as $dt)
                    
                @endforeach
               
                  <div class="card-body">  
                      <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="kategoriBantuan">NIM Pengusul</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hands-helping"></i></span>
                                  </div>
                                  <input type="text" class="form-control"  placeholder="NIM Ketua" value="{{Session::get('mh_username')}}" readonly>
                                  @if($errors->has('nim_ketua'))
                                  <small class="text-muted text-danger">
                                      {{ $errors->first('nim_ketua')}}
                                      </small>
                                  @endif 
                              </div>
                              </div>
          
                              <div class="form-group">
                                  <label for="kategoriBantuan">Nama Anggota 1</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-hands-helping"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="anggota_1"  placeholder="Nama Anggota" value="{{$dt->nama_anggota1}}"  disabled>
                                    @if($errors->has('anggota_1'))
                                    <small class="text-muted text-danger">
                                        {{ $errors->first('anggota_1')}}
                                        </small>
                                    @endif 
                                </div>
                                </div>
          
                                <div class="form-group">
                                  <label for="kategoriBantuan">Nama Anggota 2</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-hands-helping"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="anggota_2" id="kategoriBantuan" placeholder="Nama Anggota"  value="{{$dt->nama_anggota2}}"  disabled>
                                    @if($errors->has('anggota_2'))
                                    <small class="text-muted text-danger">
                                        {{ $errors->first('anggota_2')}}
                                        </small>
                                    @endif 
                                </div>
                                </div> 

                                
                                @php
                                    $dosen= \App\Model\Dosen::where('lvl','1')->get();
                                    $ds1= \App\Model\Dosen::where('nidn',$dt->id_dospem1)->first();
                                    $ds2= \App\Model\Dosen::where('nidn',$dt->id_dospem2)->first();

                                @endphp
                                <div class="form-group">
                                    <label>Dosen Pembimbing 1</label>
                                    <select name="dosen_1" class="form-control select2" style="width: 100%;"  disabled>
                                      <option  value="{{ $ds1->nidn }}" selected hidden>{{ $ds1->nama }}</option>
                                      @foreach ($dosen as $ds)
                                         <option value="{{$ds->nidn}}">{{$ds->nidn}}  {{$ds->nama}}</option>
                                      @endforeach
                                    
                                    </select>
                                    @if($errors->has('dosen_1'))
                                    <small class="text-muted text-danger">
                                        {{ $errors->first('dosen_1')}}
                                        </small>
                                    @endif 
                                </div>

                                <div class="form-group">
                                    <label>Dosen Pembimbing 2</label>
                                    <select name="dosen_2" class="form-control select2" style="width: 100%;"  disabled>
                                        <option  value="{{ $ds1->nidn }}" selected hidden>{{ $ds1->nama }}</option>
                                      @foreach ($dosen as $ds)
                                         <option value="{{$ds->nidn}}">{{$ds->nidn}}  {{$ds->nama}}</option>
                                      @endforeach
                                    
                                    </select>
                                    @if($errors->has('dosen_2'))
                                    <small class="text-muted text-danger">
                                        {{ $errors->first('dosen_2')}}
                                        </small>
                                    @endif 
                                </div>

                                <div class="form-group">
                                    <label for="kategoriBantuan">Judul Proposal</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-book" aria-hidden="true"></i></span>
                                      </div>
                                      <input type="text" class="form-control" name="judul" id="kategoriBantuan" placeholder="Judul Proposal" value="{{$dt->judul}}"  disabled>
                                      @if($errors->has('judul'))
                                      <small class="text-muted text-danger">
                                          {{ $errors->first('judul')}}
                                          </small>
                                      @endif 
                                  </div>
                                  </div> 
                        </div>


                        <div class="col-lg-6 col-12">

                            @php
                                $nim =Session::get('mh_username');
                           
                               $mhs= \App\Model\Mahasiswa::where('nim', $nim)->first();
                               $jenjang=strtolower($mhs->jenjang);
                                $kat = \App\Model\KategoriBantuan::where('nama',$jenjang)->first();
                            @endphp


                            <div class="form-group">
                                <label for="kategoriBantuan">Maksimal Dana Rp.{{ number_format($kat->max_biaya)  }}</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                  </div>
                                  <input type="number" class="form-control" name="biaya"  placeholder="Dana" max="{{ $kat->max_biaya  }}" value="{{$dt->biaya}}"  disabled>
                                  @if($errors->has('biaya'))
                                  <small class="text-muted text-danger">
                                      {{ $errors->first('biaya')}}
                                      </small>
                                  @endif 
                              </div>
                              </div>     
                              
                              <div class="form-group">
                                <label>Luaran Wajib</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                    </div>
                                    <select class="form-control" name="luaran_wajib"  disabled>
                                        <option value="{{$dt->luaran}}" selected hidden>{{luaran_wajib($dt->luaran)}}</option>
                                        <option value="1">Jurnal Nasional Terakreditasi</option>
                                        <option value="2">Jurnal Nasional Tidak Terakreditasi</option>
                                        <option value="3">Jurnal Internasional Bereputasi</option>
                                        <option value="4">Jurnal Internasional Tidak Bereputasi</option>
                                    </select>
                                </div>
                                @if($errors->has('luaran_wajib'))
                                <small class="text-muted text-danger">
                                    {{ $errors->first('luaran_wajib')}}
                                </small>
                                @endif 
                            </div>
                              

                            <div class="form-group">
                                <label>Luaran Tambahan</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                    </div>
                                    <select class="form-control" name="luaran_tambahan" disabled>
                                        @if ($dt->luaran_tambah != "")
                                             <option value="{{$dt->luaran_tambah}}" selected hidden>{{luaran_tambahan($dt->luaran_tambah)}}</option>
                                        @endif
                                        <option value="1">Model</option>
                                        <option value="2">Prototipe</option>
                                        <option value="3">Teknologi Tepat Guna</option>
                                        <option value="4">Draft Paten</option>
                                        <option value="5">Desain Industri</option>
                                        <option value="6">Hak Cipta</option>
                                        <option value="7">Luaran Lainya</option>
                                    </select>
                                </div>
                                @if($errors->has('luaran_tambahan'))
                                <small class="text-muted text-danger">
                                    {{ $errors->first('luaran_tambahan')}}
                                </small>
                                @endif 
                            </div>
                        

                            
                 
                      Preview Surat Aktif <br>
                      {{preview_proposal($dt->surat_aktif)}}<br><br>
                  

                      Preview Surat Pernyataan <br>
                      {{preview_proposal($dt->surat_nyata)}}<br><br>
                                
                  
                      Preview Proposal <br>
                      {{preview_proposal($dt->berkas_proposal)}}<br>

                         

                        </div>
                      </div>
                  

                   
                  </div>
                  <!-- /.card-body -->
  
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection