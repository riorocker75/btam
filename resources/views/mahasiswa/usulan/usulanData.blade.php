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

        <div class="row">         
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Daftar Usulan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Pengajuan</th>
                        <th>Syarat</th>
                        <th width="15%">Aksi</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                         
                         @php
                            $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                         @endphp   
                    <tr>
                        <td>{{$kat->nama}}</td>

                        <td>
                          <b> Penawaran Bantuan: </b> {{ format_tanggal(date('Y-m-d', strtotime($dt->pembukaan_tawaran))) }}<br>  
                          <b>  Deadline Proposal : </b> {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_proposal))) }} <br> 
                          <b>  Deadline Deskevaluasi : </b> {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_deskevaluasi))) }} <br> 
                          <b> Deadline Rekening : </b> {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_rek))) }} <br>  
                          <b>  Deadline Kemajuan : </b> {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_kemajuan))) }} <br> 
                          <b> Deadline Akhir : </b> {{ format_tanggal(date('Y-m-d', strtotime($dt->deadline_akhir))) }}    
                        
                        </td>

                        <td>
                            <b> Jenjang Pendidikan: </b> {{ $kat->syarat_pendidikan }}<br>  
                            <b> Jumlah Anggota: </b>    {{$kat->min_anggota}} - {{$kat->max_anggota}}<br>  
                            <b> Range Biaya: </b>    Rp.{{$kat->min_biaya}} s.d Rp.{{number_format($kat->max_biaya)}}<br>  

                         
                        </td>
                      
                        <td>
                           <p> <a href="{{ url('/mahasiswa/daftar-usulan/unggah-proposal/'.$dt->id.'')}}" class="btn btn-block btn-outline-primary btn-sm">Unggah Proposal</a></p>
                      

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