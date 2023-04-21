<?php

namespace App\Http\Controllers\Chauffeur;

use App\Models\Remorque;
use App\Models\Tracteur;
use App\Models\FicheAtelier;
use App\Models\FicheTravail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FicheTravailController extends Controller
{
    public function storeFc(Request $request)
    {
        $request->validate([
            'remorque_id' => 'required',
            'tracteur_id' => 'required',
        ]);

        $fctravail = new FicheTravail();


        $fctravail->user_id = auth()->user()->id;
        $fctravail->oil = $request->input('oil') ? true : false;
        $fctravail->adb = $request->input('adb') ? true : false;
        $fctravail->net_pl = $request->input('net_pl') ? true : false;
        $fctravail->net_semi = $request->input('net_semi') ? true : false;
        $fctravail->repar = $request->input('repar');

        $parc = $request->input('remorque_id');
        $remorque = Remorque::where('n°_de_parc', $parc)->get();
        $remorque_id = $remorque->pluck('id');
        if(count($remorque) == '0'){
            return redirect()->back()->with('error', "Cette immatriculation n'existe pas ou plus");
        }
        $fctravail->remorque_id = $remorque_id[0];

        $immatriculation = $request->input('tracteur_id');
        $tracteur = Tracteur::where('immatriculation', $immatriculation)->get();
        $tracteur_id = $tracteur->pluck('id');
        if(count($tracteur) == '0'){
            return redirect()->back()->with('error', "Cette immatriculation n'existe pas ou plus");
        }
        $fctravail->tracteur_id = $tracteur_id[0];
        //dd($fctravail);
        $fctravail->save();

        return redirect()->back()->with('success', "La fiche travail a bien été enregistrée.");
    }

    public function storeFa(Request $request)
    {
        $fcatelier = new FicheAtelier();
        $fcatelier->user_id = auth()->user()->id;
        $fcatelier->ahd = $request->input('ahd');
        $fcatelier->ahf = $request->input('ahf');
        $fcatelier->phd = $request->input('phd');
        $fcatelier->phf = $request->input('phf');
        $fcatelier->save();
        return redirect()->route('mobile.travail')->with('success', "La fiche atelier a bien été enregistrée.");
    }
}
