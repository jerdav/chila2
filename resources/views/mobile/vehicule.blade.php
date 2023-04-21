@extends('layouts.base-mobile')
@section('content')

	<!-- PAGE CONTENT -->
<div class="page__content page__content--with-header-travail">
    <div class="header__icon mt-20">
        <a href="{{route('mobile.accueil')}}">Retour
            <img src="{{asset('mobile/images/icons/gray/arrow-back.svg')}}" />
        </a>
    </div>	
   
    
    <div class="tabs tabs--style1 mb-20 pt-20">
        <input type="radio" name="tabs2" class="check tabs__radio" id="tab1" checked="checked">
        <label class="tabs__label fz green tabs__label--12" for="tab1">Tracteurs</label>
                
        <div class="tabs__content mb-60">
            <form  method="post" action="{{route('tracteur.defaut')}}">
                {{ csrf_field() }}
                @csrf
                <div class="form__row mt-40 mb-20">
                    <label for="immatriculation">Recherche par chiffre immatriculation</label>
                    <input type="tel" name="immatriculation" id="immatriculation"  class="form__input " placeholder="Immat Tracteur" autocomplete="off" required/>
                    <div id="imat"></div>
                </div>
                <hr>
                <div class="form__row">
                    <div class="text-center mt-20">
                        <h2>Les contrôles</h2>
                    </div>
                    <label for="interieur"><span class="text-info">Intérieur: </span>Voyants, propreté, documents etc...</label>                           
                    <input type="text" name="interieur"  class="form__input required" placeholder="Description" />
                </div>
                <div class="form__row">
                    <label for="exterieur"><span class="text-info">Extérieur: </span>Carrosserie, pneu, fuite, etc...</label>                           
                    <input type="text" name="exterieur" class="form__input required" placeholder="Description" />
                </div>
                <div class="form__row">
                    <label for="autre"><span class="text-info">Autre: </span>Noter ici tout autre problème constaté</label>                           
                    <input type="text" name="autre" value="" class="form__input required" placeholder="Description" />
                </div>
                <div class="login-form__row mt-20">
                    <button type="submit" class=" button button--blue button--full"> Enregistrer</button>                                                                
                </div> 
                                         
            </form> 
        </div>
            
        <input type="radio" name="tabs2" class="check tabs__radio" id="tab2">
        <label class="tabs__label fz green tabs__label--12" for="tab2">Remorques</label>
        <div class="tabs__content mb-60">
            <form  method="post" action="{{route('remorque.defaut')}}">                           
                {{ csrf_field() }}
                @csrf
                <div class="form__row mt-40 mb-20">
                    <label for="parc">Recherche par n° de parc</label>
                    <input id="remorque" type="tel" name="parc" class="form__input " placeholder="N° de parc" autocomplete="off" required/>
                    <div id="remor"></div>  
                </div>
                <hr>
                <div class="form__row">
                    <div class="text-center mt-20">
                        <h2>Les contrôles</h2>
                    </div>
                    <label for="interieur"><span class="text-info">Intérieur: </span>Voyants, propreté, documents etc...</label>                           
                    <input type="text" name="interieur"  class="form__input required" placeholder="Description" />
                </div>
                <div class="form__row">
                    <label for="exterieur"><span class="text-info">Extérieur: </span>Carrosserie, pneu, fuite, etc...</label>                           
                    <input type="text" name="exterieur"  class="form__input required" placeholder="Description" />
                </div>
                <div class="form__row">
                    <label for="autre"><span class="text-info">Autre: </span>Noter ici tout autre problème constaté</label>                           
                    <input type="text" name="autre"  class="form__input required" placeholder="Description" />
                </div>
                <div class="login-form__row mt-20">
                    <button type="submit" class=" button button--blue button--full"> Enregistrer</button>                           
                </div>               
            </form>
        </div> 
            
    </div>   
</div>

@endsection


@push('scripts')
  
<script>

$(document).ready(function () {
    $('#immatriculation').keyup(function () {
        var data = $(this).val();
        if (data != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('autocompletetractdefaut') }}",
                method: "POST",
                data: {data: data, _token: _token},
                success: function (data) {
                    $('#imat').fadeIn();
                    $('#imat').html(data);
                },
            });
        }
    });
    $(document).on('click', 'li.pl', function () {
        $('#immatriculation').val($(this).text());
        $('#imat').fadeOut();
        
    });
    $('#remorque').keyup(function () {
            var data = $(this).val();
            if (data != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocompleteremordefaut') }}",
                    method: "POST",
                    data: {data: data, _token: _token},
                    success: function (data) {
                        $('#remor').fadeIn();
                        $('#remor').html(data);
                    }
                });
            }
        });
    $(document).on('click', 'li.semi', function () {
        $('#remorque').val($(this).text());
        $('#remor').fadeOut();
    
    });
});
</script>
@endpush 


