<?php

namespace App\Http\ViewComposers;

use App\Models\FicheAtelier;
use App\Models\FicheTravail;
use App\Models\RemorqueDefaut;
use App\Models\TracteurDefaut;
use Illuminate\View\View;
use Jenssegers\Agent\Agent;

class HeaderComposer
{
    public function compose(View $view): void
    {
        $view->with('agent', Agent::class);

        $view->with('tracteur_badge', TracteurDefaut::where('valider', 0));
        $view->with('remorque_badge', RemorqueDefaut::where('valider', 0));
        $view->with('travail_badge', FicheTravail::where('valider', 0));
        $view->with('atelier_badge', FicheAtelier::where('valider', 0));

    }
}