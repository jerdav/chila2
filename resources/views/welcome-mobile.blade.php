@extends('layouts.base-mobile')
@section('content')
        <div class="body-overlay"></div>
			<div class="page page--main">
            <header class="header travail">	
                    <div class="header__logo header__logo--text text-center"><a href="#"><strong>Trs</strong>Chila</a></div>	
                
            </header>
	<!-- INTRO SLIDER -->
	<div class=" slider-menu ">
		<div class="swiper-wrapper">

			<div class="swiper-slide slider-menu__slide">
				<nav class="slider-menu__nav">
					<ul class="mt-170">
 							<li class="icon-trans"></li>
							 <li class="icon-trans">
								 @auth
								 <a href="{{ route('logout') }}"
								 onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					
								 <img src="{{asset('mobile/images/icons/white/alert.svg')}}"/>
								 <span class="accueil" >{{ __('Déconnexion') }}</span>
							 </a>
							 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								 @csrf
							 </form>
								 @endauth
							</li>
							 <li class="icon-trans"></li>
							 <li class="icon-trans"></li>
							<li>
								@auth
									<a href="{{route('mobile.accueil')}}">Accueil</a>
								@else
								<a href="{{ route('login') }}">
									<img src="{{asset('mobile/images/icons/white/user.svg')}}" /><span>Connexion</span>
								</a>
								@endauth
							</li>
							<li class="icon-trans">

							</li>
							<li class="icon-trans"></li>
							<li class="icon-trans"></li>
							<li class="icon-trans"></li>


 					</ul>
				</nav>
			</div> 

		</div>
	</div>

@endsection
