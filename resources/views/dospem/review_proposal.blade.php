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
                <form role="form" action="{{url('/dosen/review-proposal/act')}}" enctype="multipart/form-data" method="post">
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
                                  <input type="text" class="form-control"  id="kategoriBantuan" placeholder="NIM Ketua" value="{{$dt->id_ketua}}" disabled>
                                
                              </div>
                              </div>
          
                                <div class="form-group">
                                    <label for="kategoriBantuan">Judul Proposal</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-book" aria-hidden="true"></i></span>
                                      </div>
                                      <input type="text" class="form-control" name="judul" id="kategoriBantuan" placeholder="Judul Proposal" value="{{$dt->judul}}" disabled>
                                     
                                  </div>
                                  </div> 


                                  
                            <div class="form-group">
                                <label for="kategoriBantuan">Dana Ajuan</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                  </div>
                                  <input type="number" class="form-control" placeholder="Dana"  value="{{$dt->biaya}}" disabled>
                               
                              </div>
                              </div>     
                              
                              <div class="form-group">
                                <label>Luaran Wajib</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                    </div>
                                    <select class="form-control" disabled>
                                        <option value="">{{luaran_wajib($dt->luaran)}}</option>
                                       
                                    </select>
                                </div>
                               
                            </div>
                              

                            <div class="form-group">
                                <label>Luaran Tambahan</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                    </div>
                                    <select class="form-control" disabled>
                                        <option value="">{{luaran_tambahan($dt->luaran_tambah)}}</option>
                                    </select>
                                </div>
                           
                            </div>
                        </div>


                        <div class="col-lg-6 col-12">

                         



                            
                    <div class="form-group">
                        <label for="avatar">Preview Surat Aktif</label>
                        <br>
                       <?php echo preview_proposal($dt->surat_aktif) ?> 
                      </div> 

                                
                    <div class="form-group">
                        <label for="avatar">Surat Pernyataan</label>
                        <br>
                        <?php echo preview_proposal($dt->surat_nyata) ?>
                      </div> 


                                
                    <div class="form-group">
                        <label for="avatar">Proposal</label>
                        <br>
                        <?php echo preview_proposal($dt->berkas_proposal) ?>
                      </div> 

                      <input type="hidden" value="{{$dt->id}}" name="sumber">

                        </div>
                      </div>
                  

                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Setujui</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection