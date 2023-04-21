    @extends('layouts.adminsb')
    @section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Modifier</h1>
      <ol class="breadcrumb mb-4">
          @inject('date' , 'Carbon\Carbon' )
          <li class="h3 breadcrumb-item active">{{ $date->isoFormat('LL') }}</li>
      </ol>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   
                    <div class="card-header">{{ __("Modifier Remorque") }}</div>
                   

                    <div class="card-body">
                    <form method="POST" action="{{ route("update-remor", $remorque->id) }}">
                        @method('POST')
                        @csrf

                        <div class="form-group row">
                            <label for="immatriculation" class="col-md-4 col-form-label text-md-right">{{ __('Immatriculation') }}</label>

                            <div class="col-md-6">
                                <input id="immatriculation" type="text" class="form-control @error('immatriculation') is-invalid @enderror" name="immatriculation" value="{{ $remorque->immatriculation}}" required autocomplete="immatriculation" autofocus>

                                @error('immatriculation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="n°_de_parc" class="col-md-4 col-form-label text-md-right">{{ __('N° de Parc') }}</label>

                            <div class="col-md-6">
                                <input id="n°_de_parc" type="text" class="form-control @error('n°_de_parc') is-invalid @enderror" name="n°_de_parc" value="{{ $remorque->n°_de_parc }}" required autocomplete="n°_de_parc" autofocus>

                                @error('n°_de_parc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection