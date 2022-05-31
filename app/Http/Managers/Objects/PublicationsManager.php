<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Membre;
use App\Models\Publication;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class PublicationsManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new Publication;
        $this->rules = [
            "titre" => 'required',
            "journal" => 'required',
            "annee_publication" => 'required',
            'resume' => 'required'
        ];
    }

    public function all()
    {
       $member = Membre::whereUserId(Auth::user()->id)->first();  
       return $member ? $member->publications : new Collection;
    }

    public function resumePublication($donnees)
    {   
        $id = $donnees['hidden_id'];
        $data = $this->unsetTheUnavailable($donnees,['hidden_id']);
        if($data['resume'])
        $this->createOrUpdate($data,$id);
        return ["result" => true,"data" => $data];
    }

    protected function otherTreatment($data)
    {
        $data["membre_id"] = Auth::user()->membre->id;
        return $this->unsetTheUnavailable($data,['hidden_id']);
    }
}