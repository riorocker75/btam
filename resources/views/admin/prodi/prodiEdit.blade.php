@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Daftar Prodi</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Prodi</li>
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
                        <h3 class="card-title">Ubah data Prodi</h3>
                    </div>    
                    <div class="card-body">
                        @foreach ($data_edit as $de)
                            <form action="{{url('/admin/daftar-prodi/update')}}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-book"></i></span>
                                      </div>
                                    <input type="hidden" value="{{$de->id}}" name="sumber">
                                      <select class="form-control" name="jurusan" required>
                                        @php
                                             $jur = \App\Model\Jurusan::all();
                                           $djurx=\App\Model\Jurusan::where('id',$de->id_jurusan)->first();
                                         @endphp
                                        <option value="{{$djurx->id}}" selected hidden>{{$djurx->nama}}</option>
                                        @foreach ($jur as $kj)
                                          <option value="{{$kj->id}}">{{$kj->nama}}</option>
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
                                    <label>Nama Prodi</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                      </div>
                                      <input type="text" class="form-control" name="nama" placeholder="Nama Prodi" value="{{$de->nama}}">
                                      @if($errors->has('nama'))
                                      <small class="text-muted text-danger">
                                          {{ $errors->first('nama')}}
                                          </small>
                                      @endif 
                                  </div>
                                  </div>

                                  <button type="submit" class="btn btn-success float-right">Simpan</button>
                            </form>
                        @endforeach

                    </div>
                    
                </div>          
            </div>                
            <div class="col-8">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Daftar Prodi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Program Studi</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $dt)
                    <tr>
                        <?php $no=1;?>
                            
                        <td>{{$no++}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>
                            @php
                                $djur=\App\Model\Jurusan::where('id',$dt->id_jurusan)->get();    
                            @endphp
                            @foreach ($djur as $item)
                            {{ $item->nama }}
                            @endforeach
                        </td>

                        <td>
                            <a href="{{ url('/admin/daftar-prodi/edit/'.$dt->id.'')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ url('/admin/daftar-prodi/delete/'.$dt->id.'')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>

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