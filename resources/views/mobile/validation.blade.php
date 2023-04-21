@extends('layouts.base-mobile')
@section('content')
    <!-- Overlay panel -->

	
	
	<!-- PAGE CONTENT -->
	<div class="page__content page__content--with-header-travail">
        <div class="header__icon mt-20">
            <a href="{{route('mobile.accueil')}}">Retour
                <img src="{{asset('mobile/images/icons/gray/arrow-back.svg')}}" alt="" title=""/>
            </a>
        </div>	

        <div class="d-flex justify-center mb-40">
            <button class="button button--green">Validation Atelier</button>
        </div>

        @foreach ($validation as $valid)
        <div class="cards cards-custom">
            <div class="card">
                <h4 class="card__title">{{$valid->user->prenom}} {{$valid->user->nom}}</h4>               
                <div class="card__details">
                    <ul>
                        <li>Matin: De {{$valid->ahd}} à {{$valid->ahf}}</li>
                        <li>Après-midi: De {{$valid->phd}} à {{$valid->phf}}</li>
                        <li>Détails: bla bla</li>
                    </ul>
                </div>
                <div class="checkbox-valid">
                    <a class="button button--red button--ex-small " href="forms.html">Valider les infos</a>
                </div> 
            </div>
        </div>
        @endforeach

	</div>


@endsection