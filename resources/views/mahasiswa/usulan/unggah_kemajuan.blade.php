@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Unggah Laporan Kemajuan</h4>
            </div><!-- /.col -->
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Laporan Kemajuan</li>
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
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Unggah</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach ($data as $dt)
                    
                @endforeach
                <form role="form" action="{{url('/mahasiswa/daftar-usulan/unggah-kemajuan/act')}}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                  <div class="card-body">  
                      <div class="row">
                        <div class="col-lg-12 col-12">
                         
                              
                                <div class="form-group">
                                    <label for="avatar">Log Book (.pdf) </label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="log_book" required>
                                        <label class="custom-file-label" for="avatar"></label>
                                      </div>
                                      @if($errors->has('log_book'))
                                      <small class="text-muted text-danger">
                                          {{ $errors->first('log_book')}}
                                      </small>
                                      @endif 
                                    </div>
                                  </div> 

                                   
                                <div class="form-group">
                                    <label for="avatar">Unggah Laporan (.pdf) </label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="laporan" required>
                                        <label class="custom-file-label" for="avatar"></label>
                                      </div>
                                      @if($errors->has('laporan'))
                                      <small class="text-muted text-danger">
                                          {{ $errors->first('laporan')}}
                                      </small>
                                      @endif 
                                    </div>
                                  </div> 
                                  <input type="hidden" name="sumber" value="{{$dt->id}}">
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