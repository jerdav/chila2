@extends('layouts.base-mobile')

@section('content')

	
<div class="page page--login" data-page="login">
    @php
        $agent = new \Jenssegers\Agent\Agent;
    @endphp
    @if (!$agent->isMobile())
        <div class="container">
    @endif
    



        <div class="login mt-40">
            <div class="login__content">	
                        <div class="header__inner index_app mt-40">	
                            <div class="header__logo header__logo--text mb-40">
                                <a href="#" style="color: red;font-weight:400;">Trs <strong>Chila</strong></a>
                            </div>

                        </div>	
{{--                <h2 class="login__title mt-40">Se connecter</h2>--}}
                    <div class="login-form">
                        <form  method="post" action="{{route('login')}}">
                            @csrf
                            <div class="login-form__row">
                                <label class="login-form__label">Identifiant</label>
                                <input type="text" name="username" value="{{old('username')}}" required autocomplete="username"  class="login-form__input "/>
                                @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                                @endif
                            </div>
                            <div class="login-form__row">
                                <label class="login-form__label">Mot de passe</label>
                                <input type="password" name="password" required autocomplete="current-password" class="login-form__input " />
                            </div>
                            <div class="form__row mt-20">
                                <div class="checkbox-simple">
                                    <input type="checkbox" name="remember" id="remember" value="agree" {{ old('remember') ? 'checked' : '' }} />
                                    <label for="remember">Se souvenir de moi !</label>
                                </div>
                            </div>
                            <div class="login-form__row">
                                @guest                                   
                                    <button type="submit" class=" button button--blue button--full">
                                        {{ __('Se Connecter') }}
                                    </button>
                                    @else
                                    <a type="button" class=" button button--blue button--full" href="{{ route('admin.dashboard') }}" >
                                        {{ __('Tableau de bord') }}
                                    </a>
                                @endguest
                                
                            </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>
</div>
<!-- PAGE END -->
@endsection
