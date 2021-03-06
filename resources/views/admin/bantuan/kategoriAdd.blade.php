@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Tambah Kategori Bantuan</h4>
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
            <div class="col-md-9">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Daftar Bantuan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{url('/admin/kategori-bantuan/act')}}" method="post">
                    {{ csrf_field() }}
                  <div class="card-body">  
                    <div class="form-group">
                      <label for="kategoriBantuan">Nama Kategori</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="nama" required>
                            <option value="">Pilih Kategori</option>
                            <option value="d3">Tugas Akhir</option>
                            <option value="d4">Skripsi</option>
                            <option value="s2">Tesis</option>
                        </select>
                        @if($errors->has('nama'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('nama')}}
                            </small>
                        @endif 
                    </div>
                    </div>
                    <div class="form-group">
                      <label>Jenjang Pendidikan</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                        </div>
                        <select class="form-control" name="jenjang" required>
                          <option value="">pilih</option>
                          <option value="D3">D3</option>
                          <option value="D4">D4</option>
                          <option value="S2">S2</option>
                        </select>
                        @if($errors->has('jenjang'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('jenjang')}}
                          </small>
                        @endif 
                      </div>
                    </div>

                  
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="minAnggota">minimal anggota</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="number" class="form-control" name="minAnggota" id="minAnggota" placeholder="min.Anggota"  required>
                            @if($errors->has('minAnggota'))
                            <small class="text-muted text-danger">
                                {{ $errors->first('minAnggota')}}
                                </small>
                            @endif  
                        </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="maxAnggota">maximal anggota</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="number" class="form-control" name="maxAnggota" id="maxAnggota" placeholder="max.Anggota"  required>
                            @if($errors->has('maxAnggota'))
                            <small class="text-muted text-danger">
                                {{ $errors->first('maxAnggota')}}
                                </small>
                            @endif  
                        </div>
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="minBiaya">minimal biaya</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" name="minBiaya" id="minBiaya" placeholder="min.Biaya"  required>
                            @if($errors->has('minBiaya'))
                            <small class="text-muted text-danger">
                                {{ $errors->first('minBiaya')}}
                                </small>
                            @endif   
                        </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="maxBiaya">maximal biaya</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" name="maxBiaya" id="maxBiaya" placeholder="max.Biaya"  required>
                            @if($errors->has('maxBiaya'))
                            <small class="text-muted text-danger">
                                {{ $errors->first('maxBiaya')}}
                                </small>
                            @endif   
                        </div>
                        </div>
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