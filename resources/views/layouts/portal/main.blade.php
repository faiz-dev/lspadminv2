<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }} @yield('page-title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/portal-app.css') }}" rel="stylesheet">
    @yield('page-style')
</head>
<body>
    <div id="app">
        {{-- <div id="top-bar">
            <div class="container text-right">
                <span>Jl Raya Kandeman KM 04. Kabupaten Batang, Jawa Tengah</span>
                <span>email: lspp1smkn1kandeman@gmail.com</span>
            </div>
        </div> --}}
        <nav id="menubar" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ url('./media/images/logo.png') }}" height="60" loading="lazy" alt="LSP P1 SMK N 1 Kandeman">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul id="menu" class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{url("/")}}" class="nav-link">Beranda</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Galeri</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('download')}}" class="nav-link">Download</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/contactus')}}" class="nav-link">Hubungi Kami</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item auth-menu">
                                <a class="nav-link" href="{{ route('member-show-login') }}"><i class="fa fa-user-circle mr-2 text-primary"></i>{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item  auth-menu">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown  auth-menu">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-primary text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle mr-2"></i>{{ Auth::user()->dataPribadi->nama ?? 'Login' }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container-fluid p-0 m-0 mainsection" >
            @yield('page-content')
        </main>
        <footer class="bg-dark mt-5">
            <div class="container px-4 py-5">
              <div class="row">
                <div class="col-sm-6">
                  <h5><b>LSP P1 SMK Negeri 1 Kandeman</b></h5>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum optio unde a nobis voluptas, laborum dolores molestias dignissimos illo perspiciatis laboriosam, officiis laudantium, labore magni autem id quisquam saepe obcaecati.
                </div>
                <div class="col-sm-4">
                  <h5>Peta Situs</h5>
                  <div class="row">
                    <div class="col">
                      <ul class="list-unstyled">
                        <li><a href="#">Profil LSP</a></li>
                        <li><a href="#">Skema Terlisensi</a></li>
                        <li><a href="#">Jadwal Uji</a></li>
                        <li><a href="#">Dokumen Download</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                      </ul>
                    </div>
                    <div class="col">
                      <ul class="list-unstyled">
                        <li><a href="#">Portal Peserta Uji</a></li>
                        <li><a href="#">Portal Asesor</a></li>
                        <li><a href="#">Portal Jejaring</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <h5>Pranala Luar</h5>
                  <ul class="list-unstyled">
                    <li><a href="https://bnsp.go.id/" target="_blank">BNSP</a></li>
                    <li><a href="https://kemnaker.go.id/" target="_blank">Kemnaker</a></li>
                  </ul>
                  <h5>Social Media</h5>
                  <div>
                    <a href="#"><i class="mr-3 fab fa-facebook"></i></a>
                    <a href="#"><i class="mr-3 fab fa-twitter"></i></a>
                    <a href="#"><i class="mr-3 fab fa-telegram"></i></a>
                  </div>
                </div>
                <div class="col-12 pt-5">
                  <hr color="#ccc" class="mb-4">
                  Lembaga Sertifikasi Profesi P1 SMK Negeri 1 Kandeman @ 2020
                </div>
              </div>
            </div>
          </footer>
    </div>

    <script src="{{url('js/portal-app.js')}}"></script>
    @yield('page-script')
</body>
</html>
