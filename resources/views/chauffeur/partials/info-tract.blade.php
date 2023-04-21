<div id="d1" class="row justify-content-center" style="display: none;">
    <div class="col-md-8 mt-3 mx-auto">

        <form action="{{route('defaut.tracteur')}} " class="mt-3" method="POST">
            
            @csrf
            
            <div class="card card-shadow ">
                <div class="card-header text-center">
                    <span class="text-center">{{ __('Tracteur') }}</span>
                </div>
                     
                
                <div class="card-body">
                    <label  class="text-info">Champ de recherche par chiffre d'immatriculation</label> 
                    <input name="immatriculation" id="immatriculation"   class=" form-control mb-2 pl" autocomplete="off" type="text" placeholder="Immat Tracteur">
                    <div id="imat"></div>

                </div>
                
            </div>
            
            <div class="card card-shadow">
                <div class="card-body">
                    <div class="card-header d-f-c">{{ __('Les Contrôles') }}</div>
                    
                    
                        <div class="mt-2 mb-2">
                            <h2 class="text-info">Intérieur</h2>
                            <p class="h6 text-secondary">Voyants, propreté, documents, etc...</p>
                            <input name="interieur" type="text" class="form-control" placeholder="Description" x-webkit-speech />
                        </div>
                        <div class="mt-2 mb-2">
                            <h2 class="text-info">Extérieur</h2>
                            <p class="h6 text-secondary">Carrosserie, pneu, fuite, etc...</p>
                            <input name="exterieur" type="text" class="form-control" placeholder="Description">
                        </div>
                        <div class="mt-2 mb-2">
                            <h2 class="text-info">Autres</h2>
                            <p class="h6 text-secondary">Noter ici tout autre problème constaté</p>
                            <input name="autre" type="text" class="form-control" placeholder="Description">
                        </div>                    
                </div>
                <button type="submit"  class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@push('scripts')
  
    <script>

        $(document).ready(function () {
        $('#immatriculation').keyup(function () {
//            alert("working");
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
                    }
                });
            }
        });
        $(document).on('click', 'li.pl', function () {

            $('#immatriculation').val($(this).text());
            $('#imat').fadeOut();
            
        });
    });
</script>

@endpush

