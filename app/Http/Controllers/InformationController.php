<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function delete($id)
    {
        $id = Information::destroy($id);
      return response()->json(["success" => [$id],"message" => "Suppression effectuée","response_data" => [$id]]);
    }
}
