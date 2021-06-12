 <!-- Preloader -->
 {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('asset/img/pnj.png')}}">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        @if (Session::get('login-adm'))
        <a href="{{url('/dashboard/admin')}}" class="nav-link">Home</a>
        @endif

        @if (Session::get('login-ds'))
        <a href="{{url('/dashboard/dosen')}}" class="nav-link">Home</a>
        @endif

        @if (Session::get('login-rv'))
        <a href="{{url('/dashboard/reviewer')}}" class="nav-link">Home</a>
        @endif

        @if (Session::get('login-mh'))
        <a href="{{url('/dashboard/mahasiswa')}}" class="nav-link">Home</a>
        @endif
      </li>
   
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
   
     
      <!-- image user login  -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="image" >
            <i class="fa fa-user" aria-hidden="true"></i>
            {{
            Session::get('nama')}}
          </div>
        
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ url('/logout/user')}}" class="dropdown-item">
           <i class="fas fa-sign-out-alt "></i> Logout
          </a>

          @if (Session::get('login-adm'))
            <a href="{{url('/admin/profile')}}" class="dropdown-item">
              <i class="fas fa-sign-out-alt "></i> Profile 
            </a>
          @endif

          @if (Session::get('login-ds'))
            <a href="{{url('/dosen/profile')}}" class="dropdown-item">
              <i class="fas fa-sign-out-alt "></i> Profile
            </a>
          @endif

          @if (Session::get('login-rv'))
            <a href="{{url('/reviewer/profile')}}" class="dropdown-item">
              <i class="fas fa-sign-out-alt "></i> Profile
           </a>
         @endif

         @if (Session::get('login-mh'))
         <a href="{{url('/mahasiswa/profile')}}" class="dropdown-item">
           <i class="fas fa-sign-out-alt "></i> Profile
         </a>
       @endif
          
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->