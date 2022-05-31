<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Managers\Objects\PublicationsManager;  


class PublicationsController extends BaseController
{
    //
    public function __construct()
    {
        $this->tg = new PublicationsManager;
        $this->name = "publications";  
    }

    public function resumePublication(Request $request)
    {
        $data = $this->tg->resumePublication($request->all());
        $message = "Résumé ajouté avec succès";
        return response()->json(["success" => $data["result"],"message" => $message,"response_data" => $data['data']],201);
    }
}
