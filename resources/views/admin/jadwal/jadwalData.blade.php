@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Jadwal Kegiatan</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Jadwal Kegiatan</li>
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
                <a class="btn btn-primary" href="{{url('admin/jadwal-kegiatan/add')}}" role="button">Tambah Jadwal Kegiatan</a>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">         
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Jadwal Kegiatan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="20%">Kategori</th>
                        <th>Jadwal</th>
                        <th width="15%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php $no=1;?>
                        @foreach ($data as $dt)
                        <td>{{ $no++}}</td>

                        @php
                            $kt = \App\Model\KategoriBantuan::where('id',$dt->id_kategoriBantuan)->first();
                        @endphp
                        <td>{{ $kt->nama }}</td>
                        <td>
                            Penawaran Bantuan: {{ format_tanggal(date('Y-m-d', strtotime($dt->pembukaan_tawaran))) }}<br> 
                            Deadline Proposal : {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_proposal))) }} <br>
                            Deadline Deskevaluasi : {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_deskevaluasi))) }} <br>
                            Deadline Rekening : {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_rek))) }} <br>
                            Deadline Kemajuan : {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_kemajuan))) }} <br>
                            Deadline Akhir : {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_akhir))) }} 
                        </td>
                        <td>
                            <a href="{{ url('/admin/jadwal-kegiatan/edit/'.$dt->id.'')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ url('/admin/jadwal-kegiatan/delete/'.$dt->id.'')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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