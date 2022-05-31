<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Membre;
use App\Models\Offre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class OffresManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new Offre;
        $this->rules = [
            "type" => "required",
            "titre" => "required|min:2",
            "debut" => "required|min:2",
            "fin" => "required",
            "description" => "required"
        ];
    }
    public function all()
    {
       $member = Membre::whereUserId(Auth::user()->id)->first();  
       return $member ? $member->offres : new Collection;
    }

    protected function otherTreatment($data)
    {
        $data["membre_id"] = Auth::user()->membre->id;
        return $this->unsetTheUnavailable($data,['hidden_id']);
    }
}