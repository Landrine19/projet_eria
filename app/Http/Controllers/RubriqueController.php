<?php

namespace App\Http\Controllers;

use App\Models\Rubrique;
use Illuminate\Http\Request;

class RubriqueController extends Controller
{
    public function add(Request $request)
    {

        $id = $request->id;
        $compterendu_id = $request->compterendu_id;
        $libelle = $request->libelle;
        $contenu = $request->contenu;

        if ($id) {
            $rub = Rubrique::find($id);
            $rub->libelle = $libelle;
            $rub->contenu = $contenu;
            $rub->save();
        } else {
            $libelle = $request->libelle;
            $contenu = $request->contenu;
            $rub = Rubrique::create([
                'libelle' => $request->libelle,
                'contenu' => $request->contenu,
                'compterendu_id' => $compterendu_id
            ]);
        }

        return response()->json($rub->toArray(), 201);
    }

    public function delete($id)
    {
        $id = Rubrique::destroy($id);
        return response()->json(['id' => $id]);
    }
}