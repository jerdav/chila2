<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Jenssegers\Agent\Agent;

class AdminHeaderComposer
{
    public function compose(View $view): void
    {
        $agent = new Agent();
        $view->with('agent', Agent::class);


    }
}