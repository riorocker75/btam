@extends('layouts.main_app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3 class="m-0">Penugasan Reviewer</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Penugasan Reviewer</li>
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
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Penugasan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <form action="{{url('/admin/jadwal-kegiatan/act')}}" method="post">
                        {{ csrf_field() }}
                <table id="data1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengusul.</th>
                        <th>Judul</th>
                        <th>Tahun</th>
                        <th>Usulan Biaya</th>
                        <th>Aksi</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)

                        @php
                            $mhs = \App\Model\Mahasiswa::where('nim',$dt->id_ketua)->first();
                            $dosen= \App\Model\Dosen::where('lvl','3')->get();

                        @endphp
                    
                    <tr>
                        <?php $no=1;?>
                    

                        <td>{{ $no++}}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td> {{ $dt->judul }} </td>
                        <td>{{ $dt->tahun_usulan }}</td>
                        <td> Rp.{{ number_format($dt->biaya) }} </td>
                       
                        <td>
                           <a href="{{url('/admin/penugasan-reviewer/pilih/'.$dt->id.'')}}">Pilih Reviewer</a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </section>
</div>

@endsection