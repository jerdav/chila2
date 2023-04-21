@extends('layouts.base-mobile')
@section('content')
	
<div class="page page--login" >

	<!-- HEADER -->
	<header class="header header--fixed">	
		<div class="header__inner">	
			<div class="header__icon"><a href="/"><img src="{{asset('mobile/images/icons/gray/arrow-back.svg')}}" alt="" title=""/></a></div>	
        </div>
        <div class="header__inner index_app">	
			<div class="header__logo header__logo--text"><a href="#" style="color: red;font-weight:400;">Trs<strong>Chila</strong></a></div>	
		</div>
	</header>

        <div class="login">
            <div class="login__content">	
                <h2 class="login__title">Se connecter</h2>
                    <div class="login-form">
                        <form id="LoginForm" method="post" action="main.html">
                            <div class="login-form__row">
                                <label class="login-form__label">Identifiant</label>
                                <input type="text" name="Username" value="" class="login-form__input " />
                            </div>
                            <div class="login-form__row">
                                <label class="login-form__label">Mot de passe</label>
                                <input type="password" name="password" value="" class="login-form__input " />
                            </div>
                            <div class="form__row mt-20">
                                <div class="checkbox-simple">
                                    <input type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }} />
                                    <label for="remember">Se souvenir de moi !</span></label>
                                </div>
                            </div>
                            <div class="login-form__row">
                                <button  class=" button button--blue button--full">
                                    <a class="text-white" href="{{route('mobile.accueil')}}">Connexion</a>
                                </button>
                                
                            </div>
                        </form>

                    </div>
            </div>
        </div>
			  


</div>
<!-- PAGE END -->
@endsection