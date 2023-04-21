<div class="card card-shadow ">
    <div class="card-header text-center">

        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAtelier" aria-expanded="false" aria-controls="collapseAtelier">
            <span class="text-center h4">{{ __('Fiche Atelier') }}</span>
        </button>
   </div>
   <div class="collapse" id="collapseAtelier">
          <form action=" {{route('save.atelier')}} "  class="mt-2"  method="POST" autocomplete="off">


        @csrf

        <div class="card-body fichetravail">
            <div class="row">
                <div class="col">

                    <div class="d-f-c">
                        <h3 class="btn btn-outline-primary">Horaires d'atelier</h3>
                    </div>
                </div>
            </div>

                
                <section id="horaire" class="mt-2">
                    <div class="row">
                        <div class="col">                 
                        <div class="form-group"> 
                            <div class="input-group" >                    
                                <input type="text"  name="ahd" class="form-control timepicker1"  placeholder="AM Heure Début" value=""/>
                            </div>
                        </div> 

                                        
                        <div class="form-group"> 
                            <div class="input-group" >                    
                                <input type="text" name="ahf" class="form-control timepicker2"  placeholder="AM Heure Fin"/>
                            </div>
                        </div>
                    </div>
                            
                    <div class="col">
                        <div class="form-group"> 
                            <div class="input-group" >                  
                                <input type="text" name="phd" class="form-control timepicker3"  placeholder="PM Heure Début"/>
                            </div>
                        </div>                                      
                        <div class="form-group"> 
                            <div class="input-group" >                    
                                <input type="text" name="phf" class="form-control timepicker4"  placeholder="PM Heure Fin"/>
                            </div>
                        </div>
                    </div>
                    </div>

                </section>
            </div> 
            <div class="row">
                
                <div class="mt-3 mx-auto">
                    <button type="submit"  class="btn btn-success text-white">Enregistrer</button>
                </div>
            </div> 
        </div>
            
    </form>
</div>               


</div>
    @push('scripts')
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

                $('.collapse').collapse('hide');
            });

            
        })(jQuery);

</script>

@endpush
    

