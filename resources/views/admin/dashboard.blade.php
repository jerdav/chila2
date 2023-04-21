@extends('layouts.adminsb')
@section('content')

          <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
                <ol class="breadcrumb mb-4">
                    @inject('date', 'Carbon\Carbon' )
                    <li class="h3 breadcrumb-item active">{{ $date->isoFormat('LL') }}</li>
                </ol>
            </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 text-center">
                        <div class="card border-left-primary mb-4">
                            <div class="card-body">Création Administrateur</div>
                            <div class="card-footer ">
                                <a id="tooltip" class="text-decoration-none lead text-gray stretched-link" 
                                data-toggle="tooltip" data-placement="top" title="Créer Admin" href=" {{route('crea-admin')}} ">Administrateur <span class="badge badge-info">{{$admins->count()}}</span></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 text-center">
                        <div class="card border-left-success  mb-4">
                            <div class="card-body">Création Chauffeur</div>
                            <div class="card-footer">
                                <a id="tooltip"  class="text-decoration-none lead text-gray stretched-link"  
                                data-toggle="tooltip" data-placement="top" title="Créer Chauffeur" href=" {{route('crea-chauf')}} ">Chauffeurs <span class="badge badge-info">{{$chauffeurs->count()}}</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 text-center">
                        <div class="card border-left-info  mb-4">
                            <div class="card-body">Création Tracteur</div>
                            <div class="card-footer">
                                <a id="tooltip"  class="text-decoration-none lead text-gray stretched-link"  
                                data-toggle="tooltip" data-placement="top" title="Créer Tracteur" href=" {{route('crea-tract')}} ">Tracteurs <span class="badge badge-info">{{$tracteurs->count()}}</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 text-center">
                        <div class="card border-left-secondary mb-4">
                            <div class="card-body">Création Remorque</div>
                            <div class="card-footer">
                                <a id="tooltip"  class="text-decoration-none lead text-gray  stretched-link"  
                                data-toggle="tooltip" data-placement="top" title="Créer Remorque" href=" {{route('crea-remor')}} ">Remorques <span class="badge badge-info">{{$remorques->count()}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                 @include('admin.partials.tableau-dashboard') 
@endsection