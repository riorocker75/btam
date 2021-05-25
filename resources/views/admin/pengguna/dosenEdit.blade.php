@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Tambah Daftar Dosen</h4>
            </div><!-- /.col -->
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Dosen</li>
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
            <div class="col-md-9">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Daftar Dosen</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{url('/admin/pengguna/dosen/act')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                
                    <div class="card-body"> 
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="id">NIDN</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">ID</span>
                                  </div>
                                  <input type="text" class="form-control" name="nidn" placeholder="NIDN" required>
                                </div>
                                @if($errors->has('nidn'))
                                <small class="text-muted text-danger">
                                    {{ $errors->first('nidn')}}
                                </small>
                                @endif 
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="pass" id="password" placeholder="password">
                                </div>
                                @if($errors->has('pass'))
                                <small class="text-muted text-danger">
                                    {{ $errors->first('pass')}}
                                </small>
                                @endif 
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                          </div>
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="nama dosen" required>
                        </div>
                        @if($errors->has('nama'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('nama')}}
                        </small>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                            </div>
                            <select class="form-control" name="pendidikan" required>
                                <option value="">Pilih...</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        @if($errors->has('pendidikan'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('pendidikan')}}
                        </small>
                        @endif 
                    </div>

                    <div class="form-group">
                        <label>Jurusan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                            </div>
                            <select class="form-control" name="jurusan" required>
                                @php
                                    $jur=\App\Model\Jurusan::all();
                                @endphp
                                <option value="">Pilih...</option>
                                @foreach ($jur as $jr)
                                    <option value="{{$jr->id}}">{{$jr->nama}}</option>
                                @endforeach
                               
                            </select>
                            @if($errors->has('jurusan'))
                            <small class="text-muted text-danger">
                                {{ $errors->first('jurusan')}}
                            </small>
                            @endif 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                          <input type="email" class="form-control" id="email"  placeholder="ex:email@mail.com" name="email" required>
                        </div>
                        @if($errors->has('email'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('email')}}
                        </small>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                          </div>
                          <input type="number" class="form-control" id="telepon" placeholder="no.telepon" name="telp">
                        </div>
                        @if($errors->has('telp'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('telp')}}
                        </small>
                        @endif 
                    </div>

                    <div class="form-group">
                        <label for="telepon">Alamat</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-home"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                        </div>
                        @if($errors->has('alamat'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('alamat')}}
                        </small>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            <label class="custom-file-label" for="avatar">unggah foto</label>
                          </div>
                          @if($errors->has('avatar'))
                          <small class="text-muted text-danger">
                              {{ $errors->first('avatar')}}
                          </small>
                          @endif 
                        </div>
                      </div> 
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection