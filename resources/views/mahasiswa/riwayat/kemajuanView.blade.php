@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Review Laporan Kemajuan</h4>
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
                  <h3 class="card-title">Review</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach ($data as $dt)
                    
                @endforeach
            
                  <div class="card-body">  
                      <div class="row">
                        <div class="col-lg-12 col-12">
                         
                              
                                <div class="form-group">
                                    <label for="avatar">Log Book</label>
                                    <br>
                                    {{preview_proposal($dt->berkas)}}
                                  </div> 

                                   
                                <div class="form-group">
                                    <label for="avatar">Laporan </label>
                                    <br>
                                    {{preview_proposal($dt->logbook)}}

                                  </> 
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