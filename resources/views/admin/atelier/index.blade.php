@extends('layouts.adminsb')
@section('content')
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fiches Atelier</h1>
            <ol class="breadcrumb mb-4">
                @inject('date', 'Carbon\Carbon' )
                <li class="h3 breadcrumb-item active">{{ $date->isoFormat('LL') }}</li>
            </ol>
          </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Fiche horaire atelier
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Matin</th>
                        <th>Après-midi</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Matin</th>
                        <th>Après-midi</th>
                        <th>Action</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($fcatelier as $fc)
                    <tr>
                        <td>{{$fc->user->prenom}} {{$fc->user->nom}}</td>
                        <td>{{$fc->created_at->translatedFormat('d F Y -- H:m')}}</td>
                        <td> De {{$fc->ahd}} à {{$fc->ahf}}</td>
                        <td>De{{$fc->phd}} à {{$fc->phf}} </td>
                        <td>
                            @if ( $fc->valider == 0 ) 
                            <form action="{{ route('updateAtelier', $fc->id) }}" method="POST">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-danger"> Enregistrer</button>
                            </form>
                                @else<span><i class="fas fa-check fa-2x text-info"></i>Validé</span>
                            @endif
                        </td>
   {{--  <td>
         @if ( $def->valider == 0)
        <form action="{{route('admin.save-defaut-tract', $def->id)}} " method="POST">
            @csrf
            <button  class="btn btn-danger"><a href="{{route('admin.save-defaut-tract', $def->id)}}"></a> Enregistrer les défauts</button>
        </form>
            
        @else
            <span class="badge badge-success">Défauts enregistrés</span>
        @endif
     </td>
     <td>{{$def->created_at->translatedFormat('d F Y -- H:m')}}</td> --}}


                    </tr>
                     @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection