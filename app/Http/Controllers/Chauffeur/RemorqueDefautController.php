<?php

namespace App\Http\Controllers\Chauffeur;

use App\Models\Remorque;
use Illuminate\Http\Request;
use App\Models\RemorqueDefaut;
use App\Http\Controllers\Controller;

class RemorqueDefautController extends Controller
{
    public function store(Request $request)
    {

        $defaut = new RemorqueDefaut;
        $defaut->interieur = $request->input('interieur');
        $defaut->exterieur = $request->input('exterieur');
        $defaut->autre = $request->input('autre');
        $defaut->user_id = auth()->user()->id;
        $parc = $request->input('parc');

        $remorque = Remorque::where('n°_de_parc', $parc)->get();

        $remorque_id = $remorque->pluck('id');
        //dd( $remorque_id, auth()->user()->id);
        if(count($remorque) == '0'){
            return redirect()->back()->with('error', "Cette immatriculation n'existe pas ou plus");
        }
        //$tracteur_id = array($tracteur => $tracteur_id);
        //$defaut->immatriculation = $tracteur['id'];
        //dd($tracteur_id);
        $defaut->remorque_id = $remorque_id[0];
        $defaut->save();

        //dd($defaut->user_id);


        return redirect()->back()->with('success', "Les défauts remorque ont bien été enregistées");
    }
}
