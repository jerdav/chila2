@extends('layouts.base-mobile')
@section('content')

	
	
	<!-- PAGE CONTENT -->
	<div class="page__content page__content--with-header-travail">
        <div class="header__icon mt-20">
            <a href="{{route('mobile.accueil')}}">Retour
                <img src="{{asset('mobile/images/icons/gray/arrow-back.svg')}}" alt="" title=""/>
            </a>
        </div>	



        <div class="d-flex justify-center mb-40">
            <button class="button button--green">Fiche Travail</button>
        </div>

        <form method="post" action="{{route('save.travail')}}" enctype="multipart/form-data">
            @csrf
            <div class="form__row d-flex  justify-space mb-40">
                <div class="mr-10">
                    <input type="tel" name="tracteur_id" id="tracteur_id" value="{{ old( 'tracteur_id' ) }}" class="form__input " placeholder="Immat Tracteur" autocomplete="off" required/>
                    <div id="imatr"></div> 
                </div>

                <div>
                    <input id="remorque_id" type="tel" name="remorque_id" class="form__input" value="{{ old( 'remorque_id' ) }}" placeholder="N° de parc" autocomplete="off" required/>
                    <div id="remorq"></div> 
                </div>

            </div>
            <div class="cards-valid cards--12">
                <div class="card">
                    <div class="card__details">
                        <h4 class="card__title text-info" style="font-size: 22px">Gaz oil</h4>
                        <div class="form__row d-flex column align-items-start justify-space">
                            <div class="checkbox-simple">
                                <input type="checkbox" name="oil[]" id="gam" value="Matinée"  />
                                <label class="box" for="gam">Matinée</label>
                            </div> 
                            <div class="checkbox-simple">   
                                <input type="checkbox" name="oil[]" id="gpm" value="Journée"  />
                                <label class="box" for="gpm">Journée</label>
                            </div>
                            <div class="checkbox-simple">   
                                <input type="checkbox" name="oil[]" id="gnt" value="Nuit"  />
                                <label class="box" for="gnt">Nuit</label>
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="card">
                    <div class="card__details">
                        <h4 class="card__title text-info" style="font-size: 22px">AdBlue</h4>
                        <div class="form__row d-flex column align-items-start justify-space">
                            <div class="checkbox-simple">
                                <input type="checkbox" name="adb[]" id="aam"  value="Matinée"  />
                                <label class="box" for="aam">Matinée</label>
                            </div> 
                            <div class="checkbox-simple">   
                                <input type="checkbox" name="adb[]" id="apm"  value="Journée"  />
                                <label class="box" for="apm">Journée</label>
                            </div>
                            <div class="checkbox-simple">   
                                <input type="checkbox" name="adb[]" id="ant"  value="Nuit"  />
                                <label class="box" for="ant">Nuit</label>
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="card">
                    <div class="card__details">
                        <h4 class="card__title text-info" style="font-size: 22px">Net-Semi</h4>
                        <div class="form__row d-flex column align-items-start justify-space">
                            <div class="checkbox-simple">
                                <input type="checkbox" name="netsemi[]" id="nsam" value="Matinée"  />
                                <label class="box" for="nsam">Matinée</label>
                            </div> 
                            <div class="checkbox-simple">   
                                <input type="checkbox" name="netsemi[]" id="nspm" value="Journée"  />
                                <label class="box" for="nspm">Journée</label>
                            </div>
                            <div class="checkbox-simple">   
                                <input type="checkbox" name="netsemi[]" id="nsnt" value="Nuit"  />
                                <label class="box" for="nsnt">Nuit</label>
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="card">
                    <div class="card__details">
                        <h4 class="card__title text-info" style="font-size: 22px">Net-Tract</h4>
                        <div class="form__row d-flex column align-items-start justify-space">
                            <div class="checkbox-simple">
                                <input type="checkbox" name="netpl[]" id="ntam" value="Matinée"  />
                                <label class="box" for="ntam">Matinée</label>
                            </div> 
                            <div class="checkbox-simple">   
                                <input type="checkbox" name="netpl[]" id="ntpm" value="Journée"  />
                                <label class="box" for="ntpm">Journée</label>
                            </div>
                            <div class="checkbox-simple">   
                                <input type="checkbox" name="netpl[]" id="ntnt" value="Nuit"  />
                                <label class="box" for="ntnt">Nuit</label>
                            </div>
                        </div>
                    </div>                  
                </div>
  
            </div>

            <div class="form__row">
                <label style="color:teal; font-size:1.6rem" for="">Petites Réparations</label>
                <textarea name="repar" class="form__textarea required" placeholder="Détail"></textarea>
            </div>

            <div class="form mt-20 mb-60">
                <button type="submit"  class=" button button--blue button--full mb-60">Enregistrer</button>   
                                       
            </div>


        </form>
	</div>

@endsection
@push('scripts')
    <script>
            $(document).ready(function () {
        $('#tracteur_id').keyup(function () {
            var data = $(this).val();
            if (data != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocompletetracttravail') }}",
                    method: "POST",
                    data: {data: data, _token: _token},
                    success: function (data) {
                        $('#imatr').fadeIn();
                        $('#imatr').html(data);
                    }
                });
            }
        });
        $(document).on('click', 'li.tract', function () {
            $('#tracteur_id').val($(this).text());
            $('#imatr').fadeOut();
            
        });
        
    });
    
    
    $(document).ready(function () {
        $('#remorque_id').keyup(function () {
            //            alert("working");
            var data = $(this).val();
            if (data != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocompleteremortravail') }}",
                    method: "POST",
                    data: {data: data, _token: _token},
                    success: function (data) {
                        $('#remorq').fadeIn();
                        $('#remorq').html(data);
                    }
                });
            }
        });
        $(document).on('click', 'li.remorque', function () {
            $('#remorque_id').val($(this).text());
            $('#remorq').fadeOut();
            
        });
    });
    </script>
@endpush