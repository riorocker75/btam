@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Daftar Bantuan</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Bantuan</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row mb-2">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="{{url('admin/kategori-bantuan/add')}}" role="button">Tambah Daftar Bantuan</a>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">         
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Daftar Bantuan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Syarat</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php $no=1;?>
                        @foreach ($data as $dt)
                        <td>{{ $no++}}</td>
                        <td>{{ $dt->nama }}</td>
                        <td>
                            Jenjang Pendidikan : {{ $dt->syarat_pendidikan}}<br> 
                            Jumlah Anggota : {{$dt->min_anggota}} - {{$dt->max_anggota}}<br>
                            Range Biaya  : Rp.{{$dt->min_biaya}} s.d Rp.{{$dt->max_biaya}}
                        </td>
                        <td>
                            <a href="{{ url('/admin/kategori-bantuan/edit/'.$dt->id.'')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ url('/admin/kategori-bantuan/delete/'.$dt->id.'')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                        @endforeach
                    </tr>
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