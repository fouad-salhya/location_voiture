<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{asset('jquery/jquery.min.js')}}"></script>
     <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    @yield('styles')
</head>
<body>
    <div id="app">
         <nav class="navbar sticky-top navbar-expand-sm bg-dark">
             <a class="navbar-brand text-white" href="{{route('home')}}">  Loc Atourisle </a>
            
             <div class="collapse navbar-collapse" id="collapsibleNavId">
                 <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="padding-left: 40px ; opacity">
                    <li class="nav-item active" >
                        <a class="nav-link text-white"  href="{{route('home')}}"  style="opacity:0.7">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('listevehicules')}}" style="opacity:0.7; padding-left:80px">Liste des Voitures</a>
                    </li>
                    {{-- <li class="nav-item active">
                       <a class="nav-link text-white"  href="{{route('home')}}"  style="opacity:0.7">About</a>
                   </li> --}}
                    @auth
                    @if (Auth::user()->role == 1)
                    <li class="nav-item">
                       <a class="nav-link text-white" href="{{route('dashbord')}}" style="opacity:0.7">Dashbord</a>
                   </li>
                    @endif
                    @if (Auth::user()->role == 0)

                    
                   @if (Auth::user()->status == 1)
                   <li class="nav-item" >
                      <a class="nav-link text-white" href="{{route('account')}}" style="opacity:0.7">Account</a>
                  </li> 
                   @endif
                     @if (Auth::user()->status == 0)
                     <li class="nav-item" >
                        <a class="nav-link text-white" href="{{route('inscrit', Auth::user()->id)}}" style="opacity:0.7">terminer l inscription</a>
                    </li> 
                     @endif
                     
                    @endif
                    @endauth
        
                    
                 
                 </ul>
                
                    @guest
                                      
                 @if (Route::has('login'))
                 <a  href="{{ route('login') }}" class="pr-3 text-white "> login </a>
                 @endif
                 
                
                 @if (Route::has('register'))
                 <a href="{{ route('register') }}" class="text-white">Register</a>
             @endif
                @else

                            <a class="nav-link text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                
                    @endguest
             </div>
         </nav>
        <main class="">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
