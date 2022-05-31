<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function delete($id)
    {
        $id = Section::destroy($id);
        return response()->json(["success" => [$id], "message" => "Suppression effectuée", "response_data" => [$id]]);
    }
}
