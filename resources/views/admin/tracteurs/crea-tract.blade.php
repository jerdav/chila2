@extends('layouts.adminsb')
@section('content')
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Création nouveau tracteur</h1>
            <ol class="breadcrumb mb-4">
                @inject('date', 'Carbon\Carbon' )
                <li class="h3 breadcrumb-item active">{{ $date->isoFormat('LL') }}</li>
            </ol>
          </div>
@include('admin.partials.crea-form')
@endsection