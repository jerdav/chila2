<?php

namespace App\Http\Controllers\Chauffeur;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChauffeurController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //dd($user->id);
        return view('mobile.index', compact('user'));
    }

    public function autocompleteTractDefaut(Request $request)
    {

        if ($request->get('data')) {
            $data = $request->get('data');
            $data = DB::table('tracteurs')
                ->where('immatriculation', 'LIKE', "%{$data}%")
                ->get();
            // dd($data);
            if($data->count() >= 1){
                $output = '<ul class="custom-listing" style="display:block; position:relative">';

                foreach ($data as $row) {

                    $output .= '
                <li class="pl" ><a  href="javascript:void(0)" class="ml-2 my-5"  style="color:gray;">' . $row->immatriculation. '</a></li>';
                }
                $output .= '</ul>';
                echo $output;

            }
        }
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
                $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

                foreach ($data as $row) {

                    $output .= '
                <li class="tract"><a  href="javascript:void(0)" class="ml-2"  style="color:gray;">' . $row->immatriculation. '</a></li>';
                }
                $output .= '</ul>';
                echo $output;

            }
        }
    }

    public function autocompleteRemorDefaut(Request $request)
    {

        if ($request->get('data')) {
            //dd($request->get('data'));
            $data = $request->get('data');
            $data = DB::table('remorques')
                ->where('n°_de_parc', 'LIKE', "%{$data}%")
                ->get();
            //dd($data);

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

            foreach ($data as $row) {
                //dd($data);
                $output .= '
                <li class="semi"><a  href="javascript:void(0)" class="ml-2"  style="color:gray;">' . $row->n°_de_parc . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;

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

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

            foreach ($data as $row) {
                //dd($data);
                $output .= '
                <li class="remorque"><a  href="javascript:void(0)" class="ml-2"  style="color:gray;">' . $row->n°_de_parc . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;

        }
    }
}
