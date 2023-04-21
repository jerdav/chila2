<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<link rel="icon" href="{{asset('img/tc.jpg')}}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>GoMobile - Premium Mobile Template</title>
<link rel="stylesheet" href="{{asset('mobile/vendor/swiper/swiper.min.css')}}">
<link rel="stylesheet" href="{{asset('mobile/css/style.css')}}">
<link rel="stylesheet" href="{{asset('mobile/css/main.css')}}">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="{{asset('mobile/css/toastr.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
</head>
<body>
    @guest
        @if(Route::has('login'))       
            @yield('content')
        @elseif (View::has('welcome-mobile'))
        <div class="body-overlay"></div>
        <div class="page page--main">
            <header class="header travail">	
                <div class="header__inner">	
                    <div class="header__logo header__logo--text "><a href="{{route('mobile.welcome')}}"><strong>Trs</strong>Chila</a></div>	
                </div>
            </header>
        
        
            @yield('content')
        </div>
        @endif
    @endguest

    @auth
        <div class="body-overlay"></div>
        <div class="page page--main">
            
            <!-- HEADER -->
            <header class="header travail">	
                <div class="header__inner">	
                    
                    <div class="header__logo header__logo--text"><a href="{{route('mobile.accueil')}}"><strong>Trs</strong>Chila</a></div>	
                    <div class="header__logo header__logo--text utilisateur"><a href="#">{{Auth::user()->nom}}-{{Auth::user()->prenom}}</a></div>
                </div>
            </header>

            @yield('content')
            

        </div>

      
    @endauth
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js" integrity="sha512-ux1VHIyaPxawuad8d1wr1i9l4mTwukRq5B3s8G3nEmdENnKF5wKfOV6MEUH0k/rNT4mFr/yL+ozoDiwhUQekTg==" crossorigin="anonymous"></script></body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    @include('notification')
    @stack('scripts')
</body>
</html>