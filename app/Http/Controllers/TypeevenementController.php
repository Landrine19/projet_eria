<?php

namespace App\Http\Controllers;

use App\Models\Typeevenement;
use Illuminate\Http\Request;

class TypeevenementController extends Controller
{
    public function delete($id)
    {
        $id = Typeevenement::destroy($id);
      return response()->json(["success" => [$id],"message" => "Suppression effectuée","response_data" => [$id]]);
    }
}
