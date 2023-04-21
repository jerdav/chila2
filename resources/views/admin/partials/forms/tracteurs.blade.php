<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="immatriculation" class="col-md-4 col-form-label text-md-right">{{ __('Immatriculation') }}</label>

            <div class="col-md-6">
                <input id="immatriculation" type="text" class="form-control @error('immatriculation') is-invalid @enderror" 
                name="immatriculation" value="{{ old('immatriculation') }}" required autocomplete="immatriculation" autofocus>

                @error('immatriculation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

{{--         <div class="form-group row">
            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

            <div class="col-md-6">
                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Identifiant') }}</label>

            <div class="col-md-6">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" username="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Choix utilisateur') }}</label>
            @if(Route::is('crea-chauf'))
            <div class="form-check mr-5 ml-3">
                <input class="form-check-input" type="radio" name="role_id" id="chauffeurs" value=2 checked>
                <label class="form-check-label" for="chauffeurs">
                  Chauffeurs
                </label>
            </div>
            @endif 
            @if(Route::is('crea-admin'))
            <div class="form-check mr-5 ml-3">
                <input class="form-check-input" type="radio" name="role_id" id="chauffeurs" value=1 checked>
                <label class="form-check-label" for="chauffeurs">
                  Administrateurs
                </label>
            </div>
            @endif

        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
 --}}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Enregistrer') }}
                </button>
            </div>
        </div>
    </form>
</div>