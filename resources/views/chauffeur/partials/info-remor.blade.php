<div id="d2" class="row justify-content-center" style="display: none;">
    <div class="col-md-8 mt-3 mx-auto">

        <form action="{{route('remorque.defaut')}}" class="mt-3" method="POST">
            
            @csrf
            
            <div class="card card-shadow ">
                <div class="card-header text-center">
                    <span class="text-center">{{ __('Remorque') }}</span>
                </div>
                     
                
                <div class="card-body">
                    <label  class="text-info">Champ de recherche par N° de parc</label> 
                    <input id="remorque" name="parc" class="form-control mb-2 semi" type="text" placeholder="N° de parc" autocomplete="off">
                    <div id="remor"></div>                   
                </div>
                
            </div>
            
            <div class="card card-shadow">
                <div class="card-body">
                    <div class="card-header d-f-c">{{ __('Les Contrôles') }}</div>
                    
                    
                        <div class="mt-2 mb-2">
                            <h2 class="text-info">Intérieur</h2>
                            <p class="h6 text-secondary">Voyants, propreté, documents, etc...</p>
                            <input name="interieur" type="text" class="form-control" placeholder="Description">
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