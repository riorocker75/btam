@extends('login.layout_login')

@section('content')
   <div class="login-box">
  <div class="login-logo">
  	<b>DAFTAR MAHASISWA</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->
       {{ show_alert() }}

      <form action="{{ url('/daftar/mahasiswa/act') }}" method="post">
        {{ csrf_field() }}

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NIM" name="nim" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @if($errors->has('nim'))
          <small class="text-muted text-danger">
              {{ $errors->first('nim')}}
          </small>
          @endif 
        </div>

        <div class="input-group mb-3">
           
            <input type="password" class="form-control" placeholder="Password" name="pass" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @if($errors->has('pass'))
            <small class="text-muted text-danger">
                {{ $errors->first('pass')}}
            </small>
            @endif 
          </div>
        
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama" name="nama" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @if($errors->has('nama'))
            <small class="text-muted text-danger">
                {{ $errors->first('nama')}}
            </small>
            @endif 
          </div>


          <div class="form-group">
            <label>Jurusan</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                </div>
                <select class="form-control" name="jurusan" required>
                    @php
                        $jur=\App\Model\Jurusan::all();
                    @endphp
                    <option value="">Pilih...</option>
                    @foreach ($jur as $jr)
                        <option value="{{$jr->id}}">{{$jr->nama}}</option>
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
            <label>PRODI</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                </div>
                <select class="form-control" name="prodi" required>
                    @php
                        $pro=\App\Model\Prodi::all();
                    @endphp
                    <option value="">Pilih...</option>
                    @foreach ($pro as $pr)
                        <option value="{{$pr->id}}">{{$pr->nama}}</option>
                    @endforeach
                   
                </select>
                @if($errors->has('prodi'))
                <small class="text-muted text-danger">
                    {{ $errors->first('prodi')}}
                </small>
                @endif 
            </div>
        </div>

        <div class="form-group">
            <label>Jenjang</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                </div>
                <select class="form-control" name="jenjang" required>
                    <option value="">Pilih...</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S2">S2</option>
                </select>
            </div>
            @if($errors->has('jenjang'))
            <small class="text-muted text-danger">
                {{ $errors->first('jenjang')}}
            </small>
            @endif 
        </div>

        <div class="form-group">
            <label>Angkatan</label>
            <div class="input-group mb-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                    </div>
                <input type="text" class="form-control" id="datepicker" name="angkatan" placeholder="angkatan" required>

                </div>
             
                @if($errors->has('angkatan'))
                <small class="text-muted text-danger">
                    {{ $errors->first('angkatan')}}
                </small>
                @endif 
            </div>
        </div>
       
    
        <div class="row">
         
          <!-- /.col -->
          <div class="col-12 ">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
 

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box --> 
@endsection