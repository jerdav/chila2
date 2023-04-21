@extends('layouts.chauff')

@section('content')
<div class="container">
{{-- info --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-shadow">
                <div class="card-header">{{ __('Tableau de bord - Chauffeur') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $user->prenom }} {{$user->nom}}
        
                </div>
            </div>
        </div>
    </div>
{{-- chox vehicule --}}
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card card-shadow">
                <div class="card-header">{{ __('Vehicules utilisés') }}</div>

                <div class="card-body">
                    <p class=" mb-2 h2" type="text">Tracteur: FB-888-LM</p>
                    <P class=" mb-2 h2" type="text">Remorque: 380</P>
                    <div class=" d-flex justify-content-center">
                        <a type="submit" href="{{route('chauffeur.dashboard')}}" class="btn btn-success mb-2">Modifier</a>
                    </div>
                    
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">OU Si aucun défaut, cocher cette case</label>
                      </div>
                      <hr>
                      <div class=" d-flex justify-content-between">
                        <a type="submit" href="{{route('chauffeur.dashboard1')}}" class="btn btn-success mb-2">Enregistrer</a>
                        <span class="h4">ou</span> 
                        <a type="submit" href="{{route('chauffeur.dashboard2')}}" class="btn btn-primary mb-2">Continuer</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
