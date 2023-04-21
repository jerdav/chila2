@extends('layouts.adminsb')
@section('content')
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Défauts Constatés</h1>
            <ol class="breadcrumb mb-4">
                @inject('date', 'Carbon\Carbon' )
                <li class="h3 breadcrumb-item active">{{ $date->isoFormat('LL') }}</li>
            </ol>
          </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Defauts Tracteurs
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Tracteur</th>
                        <th>Interieur</th>
                        <th>Exterieur</th>
                        <th>Autre</th>
                        <th>Validation</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Tracteur</th>
                        <th>Interieur</th>
                        <th>Exterieur</th>
                        <th>Autre</th>
                        <th>Validation</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($tract_def as $def)
                    <tr>
     <td>{{$def->user->prenom}} {{$def->user->nom}}</td>
     <td>{{$def->tracteur->immatriculation}}</td>
     <td>{{$def->interieur}}</td>
     <td>{{$def->exterieur}}</td>
     <td>{{$def->autre}}</td>
     <td>
        @if ( $def->valider == 0)
        <form action="{{route('admin.save-defaut-tract', $def->id)}} " method="POST">
            @csrf
            <button  class="btn btn-danger"><a href="{{route('admin.save-defaut-tract', $def->id)}}"></a> Enregistrer les défauts</button>
        </form>
            
        @else
            <span class="badge badge-success">Défauts enregistrés</span>
        @endif
     </td>
     <td>{{$def->created_at->translatedFormat('d F Y -- H:m')}}</td>


                    </tr>
                     @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection