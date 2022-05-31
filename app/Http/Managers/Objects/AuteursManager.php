<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Auteur;
use Illuminate\Database\Eloquent\Collection;

class AuteursManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new Auteur;
        $this->rules = [
            "nom" => "required",
            "prenoms" => "required|min:2",
        ];
    }
    

}