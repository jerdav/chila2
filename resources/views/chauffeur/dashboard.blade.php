@extends('layouts.chauff')

@section('content')
<!-- Page Heading -->
<div class="container  justify-content-center mb-4">
    <div class="col-md-8 mx-auto">
        <ol class="breadcrumb d-f-c mb-4">
        @inject('date', 'Carbon\Carbon' )
        <li class="h5 breadcrumb-item active">{{ $date->isoFormat('LL') }}</li>
        </ol>
    </div>
</div>
<div class="container justify-content-center">
    {{-- info --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-shadow">
                <div class="card-header text-center">
                    <span class="text-center h4">{{ __('Tableau de bord - Chauffeur') }}</span>
               </div>
                
                <div class="card-body d-f-c">
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
</div>

<div class="container justify-content-center">
    <div class="row  align-items-center">
        <div class="col-md-8 mx-auto">
            
            @include('chauffeur.partials.fiche-atelier')

        </div>
    </div>
</div>

<div class="container justify-content-center">
    <div class="row  align-items-center">
        <div class="col-md-8 mx-auto">
            @if (Session::has('message'))
                <div class="alert alert-success mx-auto">
                {{Session::get('message')}}
            </div>
            @endif

            @if (Session::has('error'))
            <div class="alert alert-danger mx-auto">
                {{Session::get('error')}}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container justify-content-center">
    <div class="row  align-items-center">
        <div class="col-md-8 mx-auto">
            
            @include('chauffeur.partials.fiche-travail')

        </div>
    </div>
</div>

<div class="container justify-content-center">
    {{-- choix vehicule --}}
    <div id="choix" class="row  justify-content-center">
        <div class="col-md-8 mx-auto">
            
            <div class="car card-shadow">
                
                <div class="card-header text-center mb-2">
                    <span class="text-center h4 ">{{ __('Défauts/Choix du véhicule') }}</span>
               </div>
                
                <div class="d-flex justify-content-around">
                    <button id="togg1" class="btn btn-primary ">Tracteur</button>
                    <button id="togg2" class="btn btn-primary ">Remorque</button>
                    <button id="annul" onclick="annuler()" class="btn btn-outline-danger" style="display: none">Annuler</button>
                </div>
            </div>
        </div>
    </div>
        {{-- info vehicule --}}

        @include('chauffeur.partials.info-tract')
        {{-- info vehicule --}}
        
        {{-- info remorque --}}
        @include('chauffeur.partials.info-remor')
    {{-- choix vehicule --}}

</div>

@push('scripts')    
        <script type="text/javascript">
            
            var togg1 = document.getElementById("togg1");
            var togg2 = document.getElementById("togg2");
            var d1 = document.getElementById("d1");
            var d2 = document.getElementById("d2");
            var choix = document.getElementById("choix")
           
            
            function tract(){
                if(getComputedStyle(d1).display != "none"){
                    d1.style.display = "none";
                    choix.style.display = "block";
                    togg2.style.display = "block";
                    } else {
                    d1.style.display = "block";
                    choix.style.display = "block";
                    togg2.style.display = "none";
                    togg1.style.display = "none";
                    annul.style.display = "block";

                }  
            };
            togg1.onclick = tract;
            
            function remor(){
                if(getComputedStyle(d2).display != "none"){
                    d2.style.display = "none";
                    choix.style.display = "block";
                    togg1.style.display = "block";
                } else {
                    d2.style.display = "block";
                    choix.style.display = "block";
                    togg1.style.display = "none";
                    togg2.style.display = "none";
                    annul.style.display = "block";
                }
            };
            
            togg2.onclick = remor;

            $(".alert").delay(3000).slideUp(500);


            annul.onclick = annuler;

            function annuler()
            {
                window.location.reload();
            }


        </script>
         
       @endpush
@endsection
        
        
        