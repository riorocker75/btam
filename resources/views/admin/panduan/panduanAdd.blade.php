@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Tambah Daftar Panduan</h4>
            </div><!-- /.col -->
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Panduan</li>
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
                  <h3 class="card-title">Tambah Daftar Panduan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{url('/admin/panduan/act')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                    <div class="card-body">  
                    <div class="form-group">
                      <label for="namaPanduan">Judul</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-file"></i></span>
                        </div>
                        <input type="text" class="form-control" id="namaPanduan" placeholder="Judul Panduan" name="nama" required>
                      </div>
                      @if($errors->has('nama'))
                      <small class="text-muted text-danger">
                          {{ $errors->first('nama')}}
                      </small>
                      @endif 
                    </div>

                    <div class="form-group">
                        <label for="deadProposal">File Panduan</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file"></i></span>
                          </div>
                          <input type="file" class="form-control" name="berkas">
                         
                        </div>
                        @if($errors->has('berkas'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('berkas')}}
                        </small>
                        @endif 
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