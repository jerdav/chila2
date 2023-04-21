<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Remorque;
use App\Models\Tracteur;
use App\Models\FicheTravail;
use Illuminate\Support\Facades\DB;

class TravailController extends Controller
{
    public function index()
    {
        $fctravail = FicheTravail::all();

        return view('mobile.travail2', compact('fctravail'));
    }

    public function autocompleteTractTravail(Request $request)
    {

        if ($request->get('data')) {
            $data = $request->get('data');
            $data = DB::table('tracteurs')
                ->where('immatriculation', 'LIKE', "%{$data}%")
                ->get();
            // dd($data);
            if($data->count() >= 1){
                $output = '<ul class="custom-list" style="display:block; position:relative">';

                foreach ($data as $row) {

                    $output .= '
                <li class="tract"><a  href="javascript:void(0)" class="ml-2"  style="color:gray;">' . $row->immatriculation. '</a></li>';
                }
                $output .= '</ul>';
                echo $output;

            }
        }
    }

    public function autocompleteRemorTravail(Request $request)
    {

        if ($request->get('data')) {
            //dd($request->get('data'));
            $data = $request->get('data');
            $data = DB::table('remorques')
                ->where('n°_de_parc', 'LIKE', "%{$data}%")
                ->get();
            //dd($data);

            $output = '<ul class="custom-list" style="display:block; position:relative">';

            foreach ($data as $row) {
                //dd($data);
                $output .= '
                <li class="remorque"><a  href="javascript:void(0)" class="ml-2"  style="color:gray;">' . $row->n°_de_parc . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;

        }
    }

    public function store(Request $request)
    {

        $fctravail = new FicheTravail();

        $fctravail->user_id = auth()->user()->id;
        $fctravail->oil = $request->input('oil');
        $fctravail->adb = $request->input('adb');
        $fctravail->netsemi = $request->input('netsemi');
        $fctravail->netpl = $request->input('netpl');
        $fctravail->repar = $request->input('repar');

        if($request->input('oil') == '' && $request->input('adb') =='' && $request->input('netsemi') =='' && $request->input('netpl') == '' &&  $request->input('repar') == ''){
            return redirect()->back()->with('error' , " Vous devez cocher ou remplir au moins une des catégories");
        }

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

        $fctravail->save();


        return redirect()->back()->with('success', "La fiche travail a bien été enregistrée");
    }
}
