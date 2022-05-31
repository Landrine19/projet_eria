<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    public function delete($id)
    {
        $id = Membre::destroy($id);
      return response()->json(["success" => [$id],"message" => "OK","response_data" => [$id]]);
    }
}
