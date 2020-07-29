<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('Titulli') - Bibloteka</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="/">Bibloteka Online</a>
              <div class="input-group w-25">
                <input type="text" class="form-control" placeholder="Kerko..." aria-label="Kerko..." aria-describedby="kerko">
                <div class="input-group-append">
                    <button type="button"  class="btn btn-primary" >
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @guest

                    @else
                    @if(Auth::user()->isAdmin)
                    <li class="nav-item">
                        <a class="nav-link @yield('libri')" href="\libri">{{ __('Librat') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('zhanri')" href="\zhaner">{{ __('Zhanret') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('autor')" href="\autor">{{ __('Autoret') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('users')" href="\users">{{ __('Perdoruesit') }}</a>
                    </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link @yield('libri')" href="\librat">{{ __('Librat') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('zhanri')" href="\zhanret">{{ __('Zhanret') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('autor')" href="\autoret">{{ __('Autoret') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('kartoni')" href="\kartoni">{{ __('Kartoni') }}</a>
                        </li>
                    @endif
                    @endguest
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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

            <div class="container-fluid pt-3">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Gabim</strong>  {{session('error')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

              @endif
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Sukses</strong>  {{session('success')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                  @endif
            <div class="row">


            @yield('content')
            </div>
        </div>
         <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
