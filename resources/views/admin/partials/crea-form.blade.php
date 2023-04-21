
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Route::is('crea-chauf'))
                <div class="card-header">{{ __('Enregistrer un nouveau Chauffeur') }}</div>
                @include('admin.partials.forms.users')
                @endif
                @if (Route::is('crea-admin'))
                <div class="card-header">{{ __('Enregistrer un nouveau Admininstrateur') }}</div>
                @include('admin.partials.forms.users')
                @endif
                @if (Route::is('crea-remor'))
                <div class="card-header">{{ __('Enregistrer une nouvelle Remorque') }}</div>
                @include('admin.partials.forms.remorques')
                @endif
                @if (Route::is('crea-tract'))
                <div class="card-header">{{ __('Enregistrer un nouveau Tracteur') }}</div>
                @include('admin.partials.forms.tracteurs')
                @endif
            </div>
        </div>
    </div>
</div>
