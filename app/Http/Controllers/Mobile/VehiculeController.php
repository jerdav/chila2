<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Remorque;
use App\Models\Tracteur;
use Illuminate\Http\Request;
use App\Models\RemorqueDefaut;
use App\Models\TracteurDefaut;
use Illuminate\Support\Facades\DB;

class VehiculeController extends Controller
{
    public function index()
    {
        return view('mobile.vehicule');
    }

    public function autocompleteTractDefaut(Request $request)
    {

        if ($request->get('data')) {
            $data = $request->get('data');
            $data = DB::table('tracteurs')
                ->where('immatriculation', 'LIKE', "%{$data}%")
                ->get();
            //dd($data);
            if($data->count() >= 1){
                $output = '<ul class="custom-listing" style="display:block; position:relative">';

                foreach ($data as $row) {

                    $output .= '
                <li class="pl" ><a  href="javascript:void(0)" class="ml-2"  style="color:gray;">' . $row->immatriculation. '</a></li>';
                }
                $output .= '</ul>';
                echo $output;

            }
        }
    }

    public function storeTract(Request $request)
    {

        $defaut = new TracteurDefaut;
        $defaut->interieur = $request->input('interieur');
        $defaut->exterieur = $request->input('exterieur');
        $defaut->autre = $request->input('autre');
        $defaut->user_id = auth()->user()->id;
        $immatriculation = $request->input('immatriculation');

        if($request->input('interieur') == '' && $request->input('exterieur') =='' && $request->input('autre') =='' ){
            return redirect()->back()->with('error' , " Un des trois champs doit etre rempli !");
        }

        $tracteur = Tracteur::where('immatriculation', $immatriculation)->get();
        $tracteur_id = $tracteur->pluck('id');
        //dd($tracteur, $defaut->user_id, $tracteur_id);

        if(count($tracteur) == '0'){

            return redirect()->back()->with('error', "Cette immatriculation n'existe pas ou plus");;
        }
        //$tracteur_id = array($tracteur => $tracteur_id);
        //$defaut->immatriculation = $tracteur['id'];
        //dd($tracteur_id);
        $defaut->tracteur_id = $tracteur_id[0];
        $defaut->save();


        /*             Toastr::success("Les défauts ont bien été enregistré", '',
                    [
                        "positionClass" => "toast-top-center",
                        "progressBar" => true,
                        "timeOut" => "5000",
                        ]); */
        return redirect()->back()->with('success',"Le contrôle tracteur a bien été enregistré" );


    }

    public function autocompleteRemorDefaut(Request $request)
    {

        if ($request->get('data')) {
            //dd($request->get('data'));
            $data = $request->get('data');
            $data = DB::table('remorques')
                ->where('n°_de_parc', 'LIKE', "%{$data}%")
                ->get();

            $output = '<ul class="custom-list" style="position:relative;">';

            foreach ($data as $row) {
                //dd($data);
                $output .= '
                <li class="semi"><a  href="javascript:void(0)" style="color:gray;">' . $row->n°_de_parc . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;

        }
    }

    public function storeRemor(Request $request)
    {

        $defaut = new RemorqueDefaut;
        $defaut->interieur = $request->input('interieur');
        $defaut->exterieur = $request->input('exterieur');
        $defaut->autre = $request->input('autre');
        $defaut->user_id = auth()->user()->id;
        $parc = $request->input('parc');

        if($request->input('interieur') == '' && $request->input('exterieur') =='' && $request->input('autre') =='' ){
            return redirect()->back()->with('error' , " Un des trois champs doit etre rempli !");
        }

        $remorque = Remorque::where('n°_de_parc', $parc)->get();

        $remorque_id = $remorque->pluck('id');
        if(count($remorque) == '0'){
            return redirect()->back()->with('error', "Cette immatriculation n'existe pas ou plus");
        }

        $defaut->remorque_id = $remorque_id[0];
        $defaut->save();

        return redirect()->back()->with('success',"Le contrôle remorque a bien été enregistré" );
    }
}
