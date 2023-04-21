
<div class="card card-shadow">
    <div class="card-header text-center">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTravail" aria-expanded="false" aria-controls="collapseTravail">
            <span class="text-center h4">{{ __('Fiche De Travail') }}</span>
        </button>
   </div>

   <div class="collapse" id="collapseTravail">
           <form action="{{ route('save.travail') }}"  class="mt-2"  method="POST">
        @csrf
        <div class="d-f-c">
            <h3 class="text-primary">Choix véhicules</h3>
        </div>

        <div class="mt-3" >
            <div  class="row">
                <div class="col">
                   
                    <input name="tracteur_id" id="tracteur_id"   
                        class=" form-control mb-2 tract @error('tracteur_id') is_invalid @enderror"                            
                        autocomplete="off" type="text" placeholder="Immat Tracteur">
                        @error('tracteur_id')
                            <div class="alert alert-danger">Ce champ est obligatoire</div>
                        @enderror
                        <label class="h6"><small>Recherche par chiffres d'immatriculation</small></label>
                    <div id="imatr"></div>
                </div>
                <div class="col">
                    
                    <input name="remorque_id" id="remorque_id" class="form-control mb-2 remorque @error('remorque_id') is_invalid @enderror" 
                     type="text" placeholder="N° de parc" autocomplete="off">                     
                     @error('remorque_id')
                     <div class="alert alert-danger">Ce champ est obligatoire</div>
                 @enderror
                 <label class="h6"><small>Recherche par n° de parc </small></label>
                    <div id="remorq"></div>  
                </div>
            </div>
            <hr>
            <div class="card-body ">
                <div class="row">
                    <div class="col">
                        <div class="custom-control custom-checkbox">
                            <input name="oil" type="checkbox" class="custom-control-input" id="customCheck1" >
                            <label class="custom-control-label" for="customCheck1">Gaz Oil</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input name="adb" type="checkbox" class="custom-control-input" id="customCheck2" >
                            <label class="custom-control-label" for="customCheck2">AdBlue</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input name="net_pl" type="checkbox" class="custom-control-input" id="customCheck3" >
                            <label class="custom-control-label" for="customCheck3">Nett.Pl</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-control custom-checkbox">
                            <input name="net_semi" type="checkbox" class="custom-control-input" id="customCheck4" >
                            <label class="custom-control-label" for="customCheck4">Nett.Semi</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck6" onclick="showRepare()">
                            <label class="custom-control-label" for="customCheck6">Réparation</label>
                        </div>
                        <section id="reparation" style="display: none;">
                            <input name="repar" type="text" class="form-control"  placeholder="Détails">
                        </section>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="mt-3 mx-auto">
                        <button type="submit"  class="btn btn-success text-white">Enregistrer</button>
                    </div>
                </div>   
            </div>
        </div>           
    </form>
   </div>
       
</div>
    
@push('scripts')
<script>

    var repare = document.getElementById('customCheck6');
    var reparation = document.getElementById('reparation');
    
    function showRepare(){
        if(getComputedStyle(reparation).display != 'none'){
            reparation.style.display = 'none';
        }else{
            reparation.style.display = 'block';
        }
    };
    
    repare.onclick = showRepare;
    

    
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


