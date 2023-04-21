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
{{--          @if (Session::has('message'))--}}
{{--<div class="alert alert-success">--}}
{{--    {{Session::get('message')}}--}}
{{--</div>--}}
{{--@endif--}}
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Tableau des chauffeurs
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Role</th>
                        
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Role</th>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($chauffeurs as $chauffeur)
                    <tr>
                        <td>{{$chauffeur->prenom}} {{$chauffeur->nom}}</td>
                        <td>{{$chauffeur->username}}</td>
                        <td>{{$chauffeur->role->name}}</td> 
                        <td>{{ $chauffeur->created_at->format('d.m.y') }}</td>
                        <td>
                            
                                    <form  action="{{route('edit-chauf', $chauffeur->id)}}" method="get" >
                                        @method('get')
                                        @csrf 
                                        <button type="submit" class="float-left ml-5 btn btn-info">Editer</button>
                                    </form>


                                    <form  action="{{route('delete-chauf', $chauffeur->id)}}" method="POST" >
                                        @method('POST')
                                        @csrf 
                                        <button type="submit" class="float-right mr-5 btn btn-danger">Supprimer</button>
                                    </form> 
                          
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection