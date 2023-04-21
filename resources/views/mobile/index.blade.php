@extends('layouts.base-mobile')
@section('content')

	
	
	<!-- INTRO SLIDER -->
	<div class="swiper-container slider-menu slider-init">
		<div class="swiper-wrapper">
 			<div class="swiper-slide slider-menu__slide">
				<nav class="slider-menu__nav">
					<ul class="mt-150">

						<li class="icon-trans"></li>
						<li>
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
				   
								<img src="{{asset('mobile/images/icons/white/alert.svg')}}"/>
								<span class="accueil" >{{ __('Déconnexion') }}</span>
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</li>
						<li class="icon-trans"></li>	

						<li><a href="{{route('mobile.vehicule')}}">
                            <img src="{{asset('mobile/images/icons/white/delivery-truck.svg')}}"  /><span class="accueil" >Véhicules</span></a>
						</li>
						<li><a href="{{route('mobile.atelier')}}">
                            <img src="{{asset('mobile/images/icons/white/setting-hour.svg')}}" /><span class="accueil" >Atelier</span></a>
						</li>
						<li><a href="{{route('mobile.travail')}}">
                            <img src="{{asset('mobile/images/icons/white/settings.svg')}}"  /><span class="accueil" >Travail</span></a>
						</li>

						<li class="icon-trans"></li>
						<li class="icon-trans"></li>
						<li class="icon-trans"></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- <div class="swiper-pagination slider-menu__pagination"></div> -->
	</div>

@endsection