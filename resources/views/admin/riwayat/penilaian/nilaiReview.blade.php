@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Review Pendanaan</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Review Pendanaan</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->
    @foreach ($data as $dt)
        
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
     
        <div class="row">   
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Review Pendanaan</h3>
                    </div>    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Dana Rekomendasi Reviewer 1</label>
                                    <div class="input-group mb-3">
                                      @php
                                         $nilai= \App\Model\Nilai::where('id_usulan',$dt->id)->get();
                                        foreach ($nilai as $nl) {}
                                        $rv1=\App\Model\Nilai::where('status','1')->where('id_usulan',$dt->id)->first();
                                         $rv2=\App\Model\Nilai::where('status','2')->where('id_usulan',$dt->id)->first();

                                          $rv1c=\App\Model\Nilai::where('status','1')->where('id_usulan',$dt->id)->count();
                                          $rv2c=\App\Model\Nilai::where('status','2')->where('id_usulan',$dt->id)->count();

                                      @endphp
                                      <h3>Rp.{{number_format($rv1->dana_setuju)}}</h3>

                                  </div>
                                  </div>
                            </div>   
                            @if ($rv2c > 0 )
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Dana Rekomendasi Reviewer 2</label>
                                        <div class="input-group mb-3">
                                        <h3>Rp.{{number_format($rv2->dana_setuju)}}</h3>
                                    </div>
                                    </div>
                                </div>
                            @endif
                         
                        
                        </div>    



                    </div>
                    
                </div>          
            </div>     
            
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dana setujui</h3>
                    </div>    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{url('/admin/hasil-penilaian/update')}}" method="post">
                                    {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Dana Final</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                      </div>
                                      <input type="number" class="form-control" name="dana">
                                      <input type="hidden" class="form-control" name="sumber" value="{{$dt->id}}">

                                      @if($errors->has('dana'))
                                      <small class="text-muted text-danger">
                                          {{ $errors->first('dana')}}
                                          </small>
                                      @endif 
                                  </div>
                                  </div>

                                  <input type="submit" value="Setujui" class="btn btn-primary" name="setuju" id="setuju">
                                  <input type="submit" value="Tolak" class="btn btn-danger" name="tolak" id="tolak">
                                </form>
                        
                        </div>    



                    </div>
                    
                </div>          
            </div>  
            
        </div>
    </section>
    @endforeach

</div>

@endsection