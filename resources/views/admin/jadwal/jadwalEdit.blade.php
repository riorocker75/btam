@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Tambah Jadwal Kegiatan</h4>
            </div><!-- /.col -->
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Jadwal Kegiatan</li>
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
                  <h3 class="card-title">Tambah Jadwal Kegiatan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach ($data_edit as $dt)
                    
                <form role="form" action="{{url('/admin/jadwal-kegiatan/update')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">  
                    <div class="form-group">
                      <label for="kategoriBantuan">Kategori Bantuan</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                        </div>
                        @php
                            $kt = \App\Model\KategoriBantuan::get();
                            $ktx =\App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                        @endphp
                        <select class="form-control" name="kategori" required>
                            <option value="{{$ktx->id}}" selected hidden>{{$ktx->nama}}</option>
                            @foreach ($kt as $k)
                             <option value="{{$k->id}}">{{$k->nama}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('kategori'))
                        <small class="text-muted text-danger">
                            {{ $errors->first('kategori')}}
                            </small>
                        @endif 
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Penawaran Bantuan</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="hidden" name="sumber" value="{{$dt->id}}">
                            <input type="date" class="form-control" name="penawaran" value="<?php echo date('Y-m-d', strtotime($dt->pembukaan_tawaran))?>" required>
                              @if($errors->has('penawaran'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('penawaran')}}
                              </small>
                              @endif 
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="deadProposal">Deadline Proposal</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control" name="deadline_proposal" value="<?php echo date('Y-m-d', strtotime($dt->deadline_proposal))?>"  required>
                            @if($errors->has('deadline_proposal'))
                            <small class="text-muted text-danger">
                                {{ $errors->first('deadline_proposal')}}
                            </small>
                            @endif 
                          </div>
                        </div>
                      </div>
                    </div>  

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Deadline Rekening</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control" name="deadline_rekening"  value="<?php echo date('Y-m-d', strtotime($dt->deadline_rek))?>" required>
                              @if($errors->has('deadline_rekening'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('deadline_rekening')}}
                              </small>
                              @endif 
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="deadProposal">Deadline Deskevaluasi</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control" name="deadline_desk"  value="<?php echo date('Y-m-d', strtotime($dt->deadline_deskevaluasi))?>" required>
                            @if($errors->has('deadline_desk'))
                            <small class="text-muted text-danger">
                                {{ $errors->first('deadline_desk')}}
                            </small>
                            @endif 
                          </div>
                        </div>
                      </div>
                    </div>  


                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Deadline Kemajuan</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control" name="deadline_kemajuan"  value="<?php echo date('Y-m-d', strtotime($dt->deadline_kemajuan))?>" required>
                              @if($errors->has('deadline_kemajuan'))
                              <small class="text-muted text-danger">
                                  {{ $errors->first('deadline_kemajuan')}}
                              </small>
                              @endif 
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="deadProposal">Deadline Akhir</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control" name="deadline_akhir"  value="<?php echo date('Y-m-d', strtotime($dt->deadline_akhir))?>" required>
                            @if($errors->has('deadline_akhir'))
                            <small class="text-muted text-danger">
                                {{ $errors->first('deadline_akhir')}}
                            </small>
                            @endif 
                          </div>
                        </div>
                      </div>
                    </div>
                  

                    @if ($dt->berkas_pengesahan != "")

                    {{-- <div class="form-group">
                      <label for="deadProposal">Berkas Pengesahan</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-file"></i></span>
                        </div>
                        <input type="file" class="form-control" name="berkas" >
                      </div>
                      @if($errors->has('berkas'))
                      <small class="text-muted text-danger">
                          {{ $errors->first('berkas')}}
                      </small>
                      @endif 
                    </div>
                    <div>

                    </div> --}}
                   
                   


                     @endif
                     
                       
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                </form>
                @endforeach

              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</div>


@endsection