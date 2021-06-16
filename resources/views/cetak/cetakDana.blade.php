@extends('layouts.cetak_app')
@section('content')

<div class="cetak_transaksi">
    <div class="judul_laporan">
       Riwayat Pendanaan<br>
       <span>Politeknik Negeri Jakarta</span> <br>
       <span>{{$dari}} - {{$sampai}}</span><br><br>

    </div>
    
    <div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ketua</th>
                    <th>Jurusan</th>
                    <th>Program Studi</th>
                    <th>Judul</th>
                    <th>Rekomendasi Dana</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($data as $dt)

                @php
                $kat = \App\Model\KategoriBantuan::where('id', $dt->id_kategoriBantuan)->first();
                $mhs = \App\Model\Mahasiswa::where('nim',$dt->id_ketua)->first();
                $jur = \App\Model\Jurusan::where('id',$dt->id_jurusan)->first();
                $pro = \App\Model\Prodi::where('id_jurusan',$dt->id_jurusan)->first();
              
                @endphp 
               <tr>
                <td>{{$no++}}</td>
                <td>{{$mhs->nama}}</td>

                <td>{{$jur->nama}}</td>
                <td>{{$pro->nama}}</td>

                <td>
                  {{$dt->judul}}
                </td>
               
                <td>Rp.{{number_format($dt->biaya)}}</td>
              
             
              <td>{{status_catatan($dt->status)}}</td>
               </tr>
               @endforeach
            </tbody>
        </table>  
    </div>  
</div>

@endsection