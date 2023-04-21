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
            <button class="button button--green">Horaire Atelier</button>
        </div>

        
        <form method="post" action="{{route('save.atelier')}}">
            @csrf

            <div class="form">
                <hr>
                <div class="d-flex justify-center">
                    <h2 class="text-info">Matinée</h2>
                </div>
                <div class="form__row d-flex align-items-center justify-space">
                    <input type="text" onfocus="blur();" name="ahd"  class="form__input form__input--12 timepicker1" placeholder="Heure Début"required  autocomplete="off"/>
                    <input type="text" onfocus="blur();" name="ahf" class="form__input form__input--12 timepicker2" placeholder="Heure Fin" required autocomplete="off"/>
                </div>  
                <hr>
                <div class="d-flex justify-center">
                    <h2 class="text-info">Journée</h2>
                </div>
                <div class="form__row d-flex align-items-center justify-space">
                    <input type="text" onfocus="blur();" name="phd"  class="form__input form__input--12 timepicker3" placeholder="Heure Début"  autocomplete="off"/>
                    <input type="text" onfocus="blur();" name="phf"  class="form__input form__input--12 timepicker4" placeholder="Heure Fin"  autocomplete="off"/>
                </div> 
                 <hr>  
                 <div class="d-flex justify-center">
                    <h2 class="text-info">Detail</h2>
                </div>
                <div class="form__row d-flex align-items-center justify-space">
                    <input type="text" name="Text" class="form__input form__input--full" placeholder="Détail des travaux" required/>
                    
                </div> 
                 <hr>                
            </div> 
            
            <div class="login-form__row mt-40">
                <button type="submit" class=" button button--blue button--full mb-100">Enregistrer</button>
                                          
            </div>         
        </form>
        
	</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
        
(function($) {
    $(function() {
        $('input.timepicker1').timepicker({
            timeFormat: 'H:mm',
            interval: 15,
            minTime: '6',
        });
        $('input.timepicker2').timepicker({
            timeFormat: 'H:mm',
            interval: 15,
            minTime: '6',
        });
        $('input.timepicker3').timepicker({
            timeFormat: 'H:mm',
            interval: 15,
            minTime: '6',
        });
        $('input.timepicker4').timepicker({
            timeFormat: 'H:mm',
            interval: 15,
            minTime: '6',
        });
    });   
})(jQuery);
</script>
    
@endpush
@endsection