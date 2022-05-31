<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Poste;
use App\Models\Tache;

class PostesManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new Poste;
        $this->rules = [];
    }

}