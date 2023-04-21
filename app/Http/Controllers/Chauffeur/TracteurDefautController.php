<?php

namespace App\Http\Controllers\Chauffeur;

use App\Models\Tracteur;
use Illuminate\Http\Request;
use App\Models\TracteurDefaut;
use App\Http\Controllers\Controller;

class TracteurDefautController extends Controller
{
    public function store(Request $request)
    {

        $defaut = new TracteurDefaut;
        $defaut->interieur = $request->input('interieur');
        $defaut->exterieur = $request->input('exterieur');
        $defaut->autre = $request->input('autre');
        $defaut->user_id = auth()->user()->id;
        $immatriculation = $request->input('immatriculation');

        $tracteur = Tracteur::where('immatriculation', $immatriculation)->get();
        $tracteur_id = $tracteur->pluck('id');
        //dd($tracteur, $defaut->user_id, $tracteur_id);

        if(count($tracteur) == '0'){
            return redirect()->back()->with('error', "Cette immatriculation n'existe pas ou plus");
        }
        //$tracteur_id = array($tracteur => $tracteur_id);
        //$defaut->immatriculation = $tracteur['id'];
        //dd($tracteur_id);
        $defaut->tracteur_id = $tracteur_id[0];
        $defaut->save();



        return redirect()->back()->with('success', "Le contrôle tracteur a bien été enregisté");





        //dd($defaut->user_id);



    }
}
