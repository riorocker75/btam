@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Daftar Pengguna</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Pengguna</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row mb-2">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="{{url('/admin/pengguna/dosen/add')}}" role="button">Tambah Daftar Dosen</a>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">         
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Daftar Dosen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIDN</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Jurusan</th>
                        <th>Telepon</th>
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
                        <td>{{$dt->pendidikan_terakhir}}</td>
                        <td>{{$jur->nama}}</td>
                        <td>{{$dt->telepon}}</td>
                        <td>
                            <a href="{{ url('/admin/pengguna/dosen/edit/'.$dt->id.'')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ url('/admin/pengguna/dosen/delete/'.$dt->id.'')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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