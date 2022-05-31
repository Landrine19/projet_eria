<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Membre;
use App\Models\Projet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ProjetsManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new Projet;
        $this->rules = [
            "titre" => 'required',
            'debut' => "required",
            'fin' => 'required',
            'description' => 'required'
        ];
    }

    public function all()
    {
       $member = Membre::whereUserId(Auth::user()->id)->first();  
       return $member ? $member->projets : new Collection;
    }

    protected function otherTreatment($data)
    {
        $data["membre_id"] = Auth::user()->membre->id;
        return $this->unsetTheUnavailable($data,['hidden_id']);
    }

    public function changeProjetState($donnees)
    {
        $id = $donnees['hidden_id'];
        $data = $this->unsetTheUnavailable($donnees,['hidden_id']);
        if($data['statut'])
        $this->createOrUpdate($data,$id);
        return ["result" => true,"data" => $data];
    }
}