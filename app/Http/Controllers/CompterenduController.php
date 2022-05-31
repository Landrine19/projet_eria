<?php

namespace App\Http\Controllers;

use App\Models\Compterendu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompterenduController extends Controller
{
    public static function all()
    {
        return Compterendu::all();
    }

    public function add(Request $request)
    {
        $libelle = $request->libelle;
        $id = $request->id;
        $evenement_id = $request->evenement_id;

        if ($id) {
            $cr = Compterendu::find($id);
            $cr->libelle = $libelle;
            $cr->save();
        } else {
            $cr = Compterendu::create([
                'libelle' => $libelle,
                'evenement_id' => $evenement_id,
            ]);
        }
        
        return response()->json($cr->toArray(), 201);
    }

    public function delete($id)
    {
        $id = Compterendu::destroy($id);
        return response()->json(['id' => $id]);
    }
}
