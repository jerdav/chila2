<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\FicheAtelier;
use Illuminate\Http\Request;

class AtelierController extends Controller
{
    public function index()
    {
        return view('mobile.atelier');
    }

    public function store(Request $request)
    {

        $fcatelier = new FicheAtelier();
        $fcatelier->user_id = auth()->user()->id;
        $fcatelier->ahd = $request->input('ahd');
        $fcatelier->ahf = $request->input('ahf');
        $fcatelier->phd = $request->input('phd');
        $fcatelier->phf = $request->input('phf');
        $fcatelier->save();
        return redirect()->back()->with('success', "La fiche atelier a bien été enregistrée.");
    }

    public function showvalidation()
    {
        $validation = FicheAtelier::where('valider' , 0)->get();
        return view('mobile.validation', compact('validation'));
    }

    public function storevalidation(Request $request)
    {
        //
    }
}
