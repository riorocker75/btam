@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h4 class="m-0">Review Rekening</h4>
            </div><!-- /.col -->
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Review Rekening</li>
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
                  <div class="card-body">  
                      <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-group">
                                <label for="kategoriBantuan">Nomor Rekening</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hands-helping"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="no_rek" id="kategoriBantuan" placeholder="Nomor Rekening" value="{{$dt->nomor_rek}}" disabled>
                                  @if($errors->has('no_rek'))
                                  <small class="text-muted text-danger">
                                      {{ $errors->first('no_rek')}}
                                      </small>
                                  @endif 
                                  <input type="hidden" name="sumber" value="{{$dt->id}}">
                              </div>
                              </div>
                              
                              <div class="form-group">
                                  <label for="kategoriBantuan">Nama Tercantum Dalam Buku Rekening</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-hands-helping"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nama_rek"  placeholder="Nama" value="{{$dt->nama_rek}}" disabled>
                                    @if($errors->has('nama_rek'))
                                    <small class="text-muted text-danger">
                                        {{ $errors->first('nama_rek')}}
                                        </small>
                                    @endif 
                                </div>
                                </div>
          
                                
                                @php
                                    $bank= \App\Model\Bank::orderBy('id','asc')->get();
                                    $bk= \App\Model\Bank::where('id',$dt->nama_bank)->first();
                                @endphp
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <select name="nama_bank" class="form-control select2" style="width: 100%;" disabled>

                                      <option value="{{$bk->id}}" selected hidden>{{$bk->nama}}</option>
                                      @foreach ($bank as $bk)
                                         <option value="{{$bk->id}}">{{$bk->nama}} </option>
                                      @endforeach
                                    
                                    </select>
                                    @if($errors->has('nama_bank'))
                                    <small class="text-muted text-danger">
                                        {{ $errors->first('nama_bank')}}
                                        </small>
                                    @endif 
                                </div>
                             
                                <div class="form-group">
                                    <label for="avatar">Foto Buku Rekening (Jpg,PNG,Jpeg) maksimal 1mb</label>
                                    <div class="input-group">
                                      {{preview_proposal($dt->foto)}}
                                    </div>
                                  </div> 

                           
                        </div>

                      </div>
                  

                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <a href="{{url('/admin/riwayat/data-rekening')}}" type="submit" class="btn btn-primary float-right">Kembali</a>
                  </div>
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection