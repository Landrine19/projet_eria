<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Evenement;
use App\Models\EvenementMembre;
use App\Models\Membre;
use App\Models\MembrePoste;
use App\Models\Typeevenement;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new User;
        $this->rules = [];
    }

    protected function otherTreatment($data)
    {
        $data["password"] = Hash::make($data['password']);
        return $this->unsetTheUnavailable($data,['hidden_id','password_confirmation']);
    }

    public function updateUserProfile($req)
    {
        $req->validate([
            'email' => 'required',
            'nom' => 'required|min:2',
            'prenoms' => 'required|min:2',
            'sexe' => 'required',
            'specialite' => 'required',
            'telephone' => 'required|min:10',
            'annee_entree' => 'required'
        ]);

        $model = new Collection;
        if($req->hidden_id) :
            $member = Membre::find($req->hidden_id);
            $member->update($req->all());
            $model = $member;
        else: 
            $data = $req->all();
            $data['user_id'] = FacadesAuth::user()->id;
            $model = Membre::create($data);
        endif;

        $data = $model;
        $data->message = "Profile mis à jour avec succès";
        session()->put('message',$data->message);
        $data->success = true;
        return $data;
    }

    public function updating(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'name' => 'required|min:2',
        ]);

        $model = new Collection;
        $member = User::find(Auth::user()->id);
        $data = $req->all();
        $data['password'] = $data['password'] ? Hash::make($data['password']) : $member->password;
        $member->update();
        $model = $member;
        
        $data = $model;
        $data->message = "Profile mis à jour avec succès";
        session()->put('message',$data->message);
        $data->success = true;
        return $data;
    }

    public function boardInfo()
    {

        $member = Membre::whereUserId(Auth::user()->id)->first();
        
        $data = new Collection;
        
        $data->nbr_rec = $member->evenements->count();
        $data->nbr_pubs = $member ? $member->publications->count() : 0;    
        $data->nbr_prj = $member ? $member->projets->count() : 0;    
        $data->nbr_offs = $member ? $member->offres->count() : 0;    

        return $data;
    }

    public function addPoste($donnees)
    {
        $errors = $this->checkRules(['poste_id' => 'required','' => ''],$donnees);
        if(count($errors) > 0 ){
            return ["result" => false,"data" => $errors];
        }else{
            if($donnees['hidden_id']) :
                $po = MembrePoste::whereMembreIdAndPosteId(Auth::user()->membre->id,$donnees['hidden_id'])->first();
                $po->update($donnees);
            else : 
                $donnees['membre_id'] = Auth::user()->membre->id;        
                MembrePoste::create($donnees);
            endif;    
        }
        $data = new Collection;
        return ["result" => true,"data" => $data];
    }

    public function editPoste($id)
    {
        $po = MembrePoste::find($id);
        return ["result" => true,"data" => $po];
    }

    public function deletePoste($donnees)
    {
        $po = MembrePoste::where(Auth::user()->id,$donnees['hidden_id'])->first();
        $po->delete(); 
        return ["result" => true,"data" => $donnees];
    }

    protected function formatedModel($model)
    {
        $col = $model->membre
                        ->postes
                        ->map(function($poste) use ($model) {
                            $po  = MembrePoste::whereMembreIdAndPosteId($model->membre->id,$poste->id)->first();
                            $poste->debut = $po->debut;
                            $poste->fin = $po->fin;
                            $poste->identity = $po->id; 
                            return $poste;
                        });
        $model->membre->postes = $col;

        return $model;
    }
}