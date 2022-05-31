<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

class FichierController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'fichier' => 'required|file'
        ]);

        $fichier = $request->file('fichier');
        $image_name = Str::random(10).date('YmdHis').'.'.$fichier->extension();
        $fichier->storeAs('public/fichiers', $image_name);

        Fichier::create([
            'name' => $request->name,
            'evenement_id' => $request->evenement_id,
            'chemin' => 'fichiers/'.$image_name
        ]);

        return redirect()->back()->with('success', 'Fichier join !');

    }

    public function delete($id)
    {
        Fichier::destroy($id);
        return redirect()->back()->with('success', 'Fichier join !');
    }
}
