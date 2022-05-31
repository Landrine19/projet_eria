<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Tache;

class TachesManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new Tache;
        $this->rules = [];
    }

    protected function otherTreatment($data)
    {
        $data["password"] = Hash::make($data['password']);
        return $this->unsetTheUnavailable($data,['hidden_id','password_confirmation']);
    }
}