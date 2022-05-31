<?php

namespace App\Http\Controllers;

use App\Models\Typecontact;
use Illuminate\Http\Request;

class TypecontactController extends Controller
{
    public function delete($id)
    {
        $id = Typecontact::destroy($id);
      return response()->json(["success" => [$id],"message" => "OK","response_data" => [$id]]);
    }
}
