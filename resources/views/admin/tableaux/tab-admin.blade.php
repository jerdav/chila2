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
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Tableau des administrateurs
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Pseudo</th>
                        <th>Role</th>
                        <th>Mot de passe</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Role</th>
                        <th>Pseudo</th>
                        <th>Mot de passe</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$admin->prenom}} {{$admin->nom}}</td>
                        <td>{{$admin->username}}</td>
                        <td>{{$admin->role->name}}</td>                       
                        <td>{{$admin->password}}</td>
                        <td>{{$admin->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection