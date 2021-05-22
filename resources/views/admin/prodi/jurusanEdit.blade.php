@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Daftar Jurusan</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Jurusan</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
     
        <div class="row">   
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ubah data jurusan</h3>
                    </div>    
                    <div class="card-body">
                        @foreach ($data_edit as $de)
                            
                            <form action="{{url('/admin/daftar-jurusan/update')}}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Nama Jurusan</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-book"></i></span>
                                      </div>
                                      <input type="text" class="form-control" name="nama" placeholder="Nama Jurusan" value="{{$de->nama}}">
                                      <input type="hidden" class="form-control" name="sumber" value="{{$de->id}}">

                                      @if($errors->has('nama'))
                                      <small class="text-muted text-danger">
                                          {{ $errors->first('nama')}}
                                          </small>
                                      @endif 
                                  </div>
                                  </div>

                                  <button type="submit" class="btn btn-success float-right">Update</button>
                            </form>
                        @endforeach

                    </div>
                    
                </div>          
            </div>          
            <div class="col-8">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Daftar Jurusan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Jurusan</th>
                        <th width="15%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>

                        @foreach ($data as $dt)

                    <tr>
                            
                        <td>{{$no++}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>
                            <a href="{{ url('/admin/daftar-jurusan/edit/'.$dt->id.'')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ url('/admin/daftar-jurusan/delete/'.$dt->id.'')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>

                        </td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>

            
        </div>
    </section>
</div>

@endsection