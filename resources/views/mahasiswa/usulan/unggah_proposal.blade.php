@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Unggah Proposal</h4>
            </div><!-- /.col -->
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Bantuan</li>
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
                  <h3 class="card-title">Unggah</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach ($data as $dt)
                    
                @endforeach
                <form role="form" action="{{url('/mahasiswa/daftar-usulan/unggah-proposal/act')}}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                  <div class="card-body">  
                      <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="kategoriBantuan">NIM Pengusul</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hands-helping"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="nim_ketua" id="kategoriBantuan" placeholder="NIM Ketua" value="{{Session::get('mh_username')}}" required>
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
                                    <input type="text" class="form-control" name="anggota_1"  placeholder="Nama Anggota">
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
                                    <input type="text" class="form-control" name="anggota_2" id="kategoriBantuan" placeholder="Nama Anggota">
                                    @if($errors->has('anggota_2'))
                                    <small class="text-muted text-danger">
                                        {{ $errors->first('anggota_2')}}
                                        </small>
                                    @endif 
                                </div>
                                </div> 

                                
                                @php
                                    $dosen= \App\Model\Dosen::where('lvl','1')->get();
                                @endphp
                                <div class="form-group">
                                    <label>Dosen Pembimbing 1</label>
                                    <select name="dosen_1" class="form-control select2" style="width: 100%;" required>
                                      <option  value="">Pilih yang akan jadi Pembimbing</option>
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
                                    <select name="dosen_2" class="form-control select2" style="width: 100%;">
                                      <option  value="">Pilih yang akan jadi Pembimbing</option>
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
                                      <input type="text" class="form-control" name="judul" id="kategoriBantuan" placeholder="Judul Proposal" required>
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
                               $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                               $mhs= \App\Model\Mahasiswa::where('nim', $nim)->first();
                            @endphp
                                  <input type="hidden" name="kategori" value="{{$dt->id_kategoriBantuan}}">
                                  <input type="hidden" name="id_jurusan" value="{{$mhs->id_jurusan}}">

                            <div class="form-group">
                                <label for="kategoriBantuan">Maksimal Dana Rp.{{ number_format($kat->max_biaya)  }}</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                  </div>
                                  <input type="number" class="form-control" name="biaya"  placeholder="Dana" max="{{ $kat->max_biaya  }}" required>
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
                                    <select class="form-control" name="luaran_wajib" required>
                                        <option value="">Pilih...</option>
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
                                    <select class="form-control" name="luaran_tambahan" >
                                        <option value="">Pilih...</option>
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


                            
                    <div class="form-group">
                        <label for="avatar">Unggah Surat Keterangan Aktif Kuliah (.pdf)</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="surat_aktif" required>
                            <label class="custom-file-label" for="avatar"></label>
                          </div>
                          @if($errors->has('surat_aktif'))
                          <small class="text-muted text-danger">
                              {{ $errors->first('surat_aktif')}}
                          </small>
                          @endif 
                        </div>
                      </div> 

                                
                    <div class="form-group">
                        <label for="avatar">Unggah Surat Pernyataan (.pdf)</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="surat_nyata" required>
                            <label class="custom-file-label" for="avatar"></label>
                          </div>
                          @if($errors->has('surat_nyata'))
                          <small class="text-muted text-danger">
                              {{ $errors->first('surat_nyata')}}
                          </small>
                          @endif 
                        </div>
                      </div> 


                                
                    <div class="form-group">
                        <label for="avatar">Unggah Proposal (.pdf)</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="surat_proposal" required>
                            <label class="custom-file-label" for="avatar"></label>
                          </div>
                          @if($errors->has('surat_proposal'))
                          <small class="text-muted text-danger">
                              {{ $errors->first('surat_proposal')}}
                          </small>
                          @endif 
                        </div>
                      </div> 


                        </div>
                      </div>
                  

                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection