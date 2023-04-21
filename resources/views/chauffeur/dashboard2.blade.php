@extends('layouts.chauff')

@section('content')
<div class="container">
  {{-- info --}}
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-shadow">
        <div class="card-header d-f-c">{{ __('Tableau de bord - Chauffeur') }}</div>
        
        <div class="card-body  d-f-c">
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
        <div class="card-header d-f-c">{{ __('Véhicules utilisés') }}</div>
        
        <div class="card-body">
          <p class=" mb-2 h2" type="text">Tracteur: FB-888-LM</p>
          <P class=" mb-2 h2" type="text">Remorque: 380</P>
          <div class=" d-flex justify-content-center">
            <a type="submit" href="{{route('chauffeur.dashboard')}}" class="btn btn-success mb-2">Modifier</a>
          </div>  
        </div>
        
      </div>
    </div>
  </div>
  
  {{-- defauts --}}
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="" class="mt-3">
        <div class="card card-shadow">
          
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="d-f-c btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Défaut Tracteur <i class="ml-3 h4 bi bi-hand-index-thumb"></i>
                  </button>
                </h2>
              </div>
              
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <h1 class="text-center">Les Controles</h1>
                  
                  <form action="" class="mt-3">
                    <div class="mt-2 mb-2">
                      <h2 class="text-info">Intérieur</h2>
                      <p class="h6 text-secondary">Voyants, propreté, documents, etc...</p>
                      <input type="text" class="form-control" placeholder="Description">
                    </div>
                    <div class="mt-2 mb-2">
                      <h2 class="text-info">Extérieur</h2>
                      <p class="h6 text-secondary">Carrosserie, pneu, fuite, etc...</p>
                      <input type="text" class="form-control" placeholder="Description">
                    </div>
                    <div class="mt-2 mb-2">
                      <h2 class="text-info">Autres</h2>
                      <p class="h6 text-secondary">Noter ici tout autre problème constaté</p>
                      <input type="text" class="form-control" placeholder="Description">
                    </div>
                    
                  </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="d-f-c btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Défaut Remorque <i class="ml-3 h4 bi bi-hand-index-thumb"></i>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <h1 class="text-center">Les Controles</h1>
                    
                    {{-- <form action="" class="mt-3"> --}}
                      <div class="mt-2 mb-2">
                        <h2 class="text-info">Intérieur</h2>
                        <p class="h6 text-secondary">Sangles, arrimage, éclairage, etc...</p>
                        <input type="text" class="form-control" placeholder="Description">
                      </div>
                      <div class="mt-2 mb-2">
                        <h2 class="text-info">Extérieur</h2>
                        <p class="h6 text-secondary">Carrosserie, pneu, fuite, etc...</p>
                        <input type="text" class="form-control" placeholder="Description">
                      </div>
                      <div class="mt-2 mb-2">
                        <h2 class="text-info">Autres</h2>
                        <p class="h6 text-secondary">Noter ici tout autre problème constaté</p>
                        <input type="text" class="form-control" placeholder="Description">
                      </div>
                      
                      <div class=" d-flex justify-content-center">
                        <a type="submit" href="{{route('chauffeur.dashboard')}}" class="btn btn-success mb-2">Enregistrer</a>
                    </div>
                    
                    </div>
                  </div>
                </div>
                
              </div>
             
              
              
            </div>
          </form>
        </div>
      </div>
      @endsection
      