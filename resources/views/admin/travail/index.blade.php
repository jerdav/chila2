@extends('layouts.adminsb')
@section('content')
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fiches de travail</h1>
            <ol class="breadcrumb mb-4">
                @inject('date', 'Carbon\Carbon' )
                <li class="h3 breadcrumb-item active">{{ $date->isoFormat('LL') }}</li>
            </ol>
          </div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Fiche travail
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Tracteur</th>
                        <th>Remorque</th>
                        <th>GazOil</th>
                        <th>AdBlue</th>
                        <th>Nettoyage Tracteur</th>
                        <th>Nettoyage Semi</th>
                        <th>Reparation</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Tracteur</th>
                        <th>Remorque</th>
                        <th>GazOil</th>
                        <th>AdBlue</th>
                        <th>Nettoyage Tracteur</th>
                        <th>Nettoyage Semi</th>
                        <th>Reparation</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                   @foreach ($fctravail as $fc)
                    <tr>
                        <td>{{$fc->user->prenom}} {{$fc->user->nom}}</td>
                        <td>{{$fc->tracteur->immatriculation}}</td>
                        <td>{{$fc->remorque->immatriculation}}</td>

                     <td>
                        @if ($fc['oil'] != null)
                        @foreach ($fc['oil'] as $oil)                    
                        {{$oil}} <br>
                        @endforeach
                        @else
                        
                    @endif
                    </td>  

                    <td> 
                    @if ($fc['adb'] != null)
                        @foreach ($fc['adb'] as $adb)                    
                        {{$adb}} <br>
                        @endforeach
                        @else
                          
                    @endif

                    </td>

                    <td>   
                     @if ($fc['netpl'] != null)
                     @foreach ($fc['netpl'] as $netpl)                    
                     {{$netpl}} <br>
                     @endforeach
                     @else
                      
                    @endif
                    </td>

                    <td>

                     @if ($fc['netsemi'] != null)
                     @foreach ($fc['netsemi'] as $netsemi)                    
                     {{$netsemi}} <br>
                     @endforeach
                     @else
                       
                    @endif
                    </td>
                            
                       
                          

 {{--                        <td>{{$fc->adb}}</td>
                        <td>{{$fc->net_pl}}</td>
                        <td>{{$fc->net_semi}}</td>  --}} 
                       

                        <td>{{$fc->repar}}</td>
                        <td>{{$fc->created_at->translatedFormat('d F Y -- H:m')}}</td>
                        <td>
                            @if ( $fc->valider == 0 ) 
                            <form action="{{ route('updateTravail', $fc->id) }}" method="POST">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-danger"> Enregistrer</button>
                            </form>
                                @else<span><i class="fas fa-check fa-2x text-info"></i>Validé</span>
                            @endif
                        </td>
                    </tr>
                     @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection