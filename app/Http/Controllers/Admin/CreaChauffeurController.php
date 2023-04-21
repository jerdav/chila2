<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CreaChauffeurController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agent = new \Jenssegers\Agent\Agent;
        return view('admin.chauffeurs.create', compact('agent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required|max:20',
            'nom'   => 'required|max:20',
            'username'  => 'required',
        ]);

        $prenom = $request->input('prenom');
        $nom = $request->input('nom');
        $username = $request->input('username');
        $role_id = $request->input('role_id');
        $password = $request->input('password');
        User::create([
            'prenom' => $prenom,
            'nom' => $nom,
            'username' => $username,
            'role_id'   => $role_id,
            'password' => Hash::make('password'),
        ]);
        Alert::success('Chauffeur ajouté avec succès', 'merci');
        return redirect()->route('admin.tab-chauf')->with('message', "L'utilisateur a bien été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chauffeur = User::find($id);
        return view('admin.chauffeurs.edit-chauf', compact('chauffeur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $chauffeur = User::find($id);
        $chauffeur->prenom = $request->input('prenom');
        $chauffeur->nom = $request->input('nom');
        $chauffeur->username = $request->input('username');
        //dd($chauffeur);
        $chauffeur->save();
        Alert::success('Chauffeur modifié avec succès', 'merci');
        return redirect()->route('admin.tab-chauf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $chauffeur = User::find($id);
        $chauffeur->delete();
        Alert::success('Êtes vous sur de vouloir supprimé ce chauffeur?', 'ok');
        return redirect()->route('admin.tab-chauf');
    }
}
