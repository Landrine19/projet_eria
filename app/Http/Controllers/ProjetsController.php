<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Managers\Objects\ProjetsManager;  


class ProjetsController extends BaseController
{
    //
    public function __construct()
    {
        $this->tg = new ProjetsManager;
        $this->name = "projets";  
    }

    public function stateProjet(Request $request)
    {
        $data = $this->tg->changeProjetState($request->all());
        $message = "Statut du projet changé avec succès";
        return response()->json(["success" => $data["result"],"message" => $message,"response_data" => $data['data']],201);
    }
}
