@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Kajur</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kajur</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      
        <div class="row">   
            <div class="col-4">
              
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Tambah Kajur</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form  action="{{url('/admin/pengguna/kajur/act')}}" method="post">
                                {{ csrf_field() }}

                                @php
                                    $dosen= \App\Model\Dosen::where('lvl','1')->get();
                                @endphp
                                <div class="form-group">
                                    <label>Daftar Dosen</label>
                                    <select name="nidn" class="form-control select2" style="width: 100%;">
                                      <option  value="">Pilih yang akan jadi Kajur</option>
                                      @foreach ($dosen as $ds)
                                         <option value="{{$ds->nidn}}">{{$ds->nidn}}  {{$ds->nama}}</option>
                                          
                                      @endforeach
                                    
                                    </select>
                                    @if($errors->has('nidn'))
                                    <small class="text-muted text-danger">
                                        {{ $errors->first('nidn')}}
                                        </small>
                                    @endif 
                                </div>

                                <button type="submit" class="btn btn-primary" >Tambah Kajur</button>
                            </form>    
                    </div>   
              </div>   
        </div>   

            <div class="col-8">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Kajur</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIDN</th>
                        <th>Telepon</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $dt)
                         @php
                             $jur=\App\Model\Jurusan::where('id',$dt->id_jurusan)->first();
                         @endphp
                    <tr>
                        <td>{{$dt->nama}}</td>
                        <td>{{$dt->nidn}}</td>
                        <td>{{$dt->telepon}}</td>
                        <td>{{$jur->nama}}</td>

                        <td>
                            <a href="{{ url('/admin/pengguna/kajur/delete/'.$dt->id.'')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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