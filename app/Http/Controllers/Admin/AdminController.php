<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Casts\Json;
use App\Models\Remorque;
use App\Models\Tracteur;
use App\Models\FicheAtelier;
use App\Models\FicheTravail;
use App\Models\RemorqueDefaut;
use App\Models\TracteurDefaut;



class AdminController extends Controller
{
    public function index()
    {

        $agent = new \Jenssegers\Agent\Agent;
        $admins = User::where('role_id', 1)->get();
        $chauffeurs = User::where('role_id', 2)->get();
        $tracteurs = Tracteur::all();
        $remorques = Remorque::all();
        $users = User::all();
        return view('admin.dashboard', compact('admins', 'chauffeurs', 'tracteurs', 'remorques', 'users', 'agent'));
    }

    public function tab_admin()
    {
        $agent = new \Jenssegers\Agent\Agent;
        $admins = User::where('role_id', 1)->get();
        return view('admin.tableaux.tab-admin', compact('admins', 'agent'));
    }

    public function tab_chauf()
    {
        $agent = new \Jenssegers\Agent\Agent;
        $chauffeurs = User::where('role_id', 2)->get();
        return view('admin.tableaux.tab-chauf', compact('chauffeurs', 'agent'));
    }

    public function tab_tract()
    {
        $agent = new \Jenssegers\Agent\Agent;
        $tracteurs = Tracteur::all();
        return view('admin.tableaux.tab-tract', compact('tracteurs', 'agent'));
    }

    public function tab_remor()
    {
        $agent = new \Jenssegers\Agent\Agent;
        $remorques = Remorque::all();
        return view('admin.tableaux.tab-remor', compact('remorques', 'agent'));
    }

    public function defaut_tract()
    {
        $agent = new \Jenssegers\Agent\Agent;
        $tract_def = TracteurDefaut::orderBy('valider', 'asc')->latest()->get();
        return view("admin.defauts.tracteurs.index", compact('tract_def', 'agent'));
    }

    public function defaut_remor()
    {
        $agent = new \Jenssegers\Agent\Agent;
        $remor_def = RemorqueDefaut::orderBy('valider', 'asc')->latest()->get();
        return view("admin.defauts.remorques.index", compact('remor_def', 'agent'));
    }

    public function saveDefautTract($id)
    {

        $valid = TracteurDefaut::where('valider', '=', 0)->find($id)->update(['valider' => 1]);
        return redirect()->back();
    }

    public function saveDefautRemor($id)
    {

        $valid = RemorqueDefaut::where('valider', '=', 0)->find($id)->update(['valider' => 1]);
        return redirect()->back();
    }

    public function ficheTravail(Json $fctravail)
    {

        $agent = new \Jenssegers\Agent\Agent;

        $fctravail = FicheTravail::orderBy('valider', 'asc')->latest()->get();
        //dd($fctravail);
        return view('admin.travail.index', compact('fctravail', 'agent'));
    }

    public function updateTravail($id)
    {

        $valid = FicheTravail::where('valider', '=', 0)->find($id)->update(['valider' => 1]);

        return redirect()->back();
    }

    public function ficheAtelier()
    {
        $agent = new \Jenssegers\Agent\Agent;
        $fcatelier = FicheAtelier::orderBy('valider', 'asc')->latest()->get();

        return view('admin.atelier.index', compact('fcatelier', 'agent'));
    }

    public function updateAtelier($id)
    {

        $fcatelier = FicheAtelier::where('valider', '=', 0)->find($id)->update(['valider' => 1]);
        return redirect()->back();
    }
}


