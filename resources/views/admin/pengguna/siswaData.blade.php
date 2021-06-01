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
        <!-- /.content-header -->
        <div class="col-sm-12">
            <a class="btn btn-primary" href="{{url('/admin/pengguna/mahasiswa/add')}}" role="button">Tambah Daftar Pengusul</a>
        </div><!-- /.col -->
    </div>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">         
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Daftar Pengusul</h3>
                
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jenjang Pendidikan</th>
                        <th>Jurusan</th>
                        <th>Prodi</th>
                        <th>Tahun Angkatan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        @php
                            $jur=\App\Model\Jurusan::where('id',$dt->id_jurusan)->first();
                            $pro=\App\Model\Prodi::where('id',$jur->id)->first();
                        @endphp
                    <tr>
                        <td>{{$dt->nama}}</td>
                        <td>{{$dt->nim}}</td>
                        <td>{{$dt->jenjang}}</td>
                        <td>{{$jur->nama}}</td>
                        <td>{{$pro->nama}}</td>

                        <td>{{$dt->angkatan}}</td>
                        <td>
                            <a href="{{ url('/admin/pengguna/mahasiswa/edit/'.$dt->id.'')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ url('/admin/pengguna/mahasiswa/delete/'.$dt->id.'')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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