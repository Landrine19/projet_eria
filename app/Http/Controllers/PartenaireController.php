<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    public function delete($id)
    {
        $id = Partenaire::destroy($id);
      return response()->json(["success" => [$id],"message" => "OK","response_data" => [$id]]);
    }
}
