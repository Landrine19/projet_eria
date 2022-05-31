<?php 

namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Evenement;
use App\Models\EvenementMembre;
use App\Models\Membre;
use App\Models\Typeevenement;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class EvenementsManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new Evenement;
        $this->rules = [
            "intitule" => 'required|min:2',
            "lieu" => 'required',
            "date_evenement" => "required",
            "heure_evenement" => "required",
        ];
    }

    public function all()
    {
      $member = Membre::whereUserId(Auth::user()->id)->first();
      return $member ? $this->formatEvents($member->evenements) : new Collection;
    }

    private function formatEvents($data)
    {
      $collect = $data->map(function($event){
        $date = date_create($event->date_evenement);
        $event->date_evenement = date_format($date,'d-m-Y');
        $event->heure_evenement = date_format($date,'H:i:s');
        return $event;
     });
      return $collect;
    }

    protected function otherTreatment($data)
    {
        $re = Typeevenement::whereLibelle("reunion")->first();
        $data["typeevenement_id"] = $re->id;
        $data["date_evenement"] = $data["date_evenement"]." ".$data["heure_evenement"];
        return $this->unsetTheUnavailable($data,['hidden_id','heure_evenement']);
    }

    protected function otherUpdateTreatment($data)
    {
        $re = Typeevenement::whereLibelle("reunion")->first();
        $data["typeevenement_id"] = $re->id;
        $data["date_evenement"] = $data["date_evenement"]." ".$data["heure_evenement"];

        //$data["password"] = Hash::make($data['password']);
        return $this->unsetTheUnavailable($data,['hidden_id','heure_evenement']);
    }

    public function create($data)
    {
      $errors = $this->checkRules($this->setRules($data),$data);
      if(count($errors) > 0 ){
        return ["result" => false,"data" => $errors];
      }else{
        $data['id'] = $this->generateId();
        $data = $this->otherTreatment($data);
        $data = $this->createOrUpdate($data);

        EvenementMembre::create([
            "evenement_id" => $data['id'] ,
            "membre_id" => Auth::user()->membre ? Auth::user()->membre->id : 1,
            "role" => "moderateur"
        ]);
      }
      return ["result" => true,"data" => $data];
    }

    public function resumeEvent($donnees)
    {   
        $id = $donnees['evenement_id'];
        $data = $this->unsetTheUnavailable($donnees,['evenement_id']);
        if($data['resume'])
        $this->createOrUpdate($data,$id);
        return ["result" => true,"data" => $data];
    }

    public function addParticipant($request)
    {

      $errors = $this->checkRules(['membres' => 'required'],$request);
      if(count($errors) > 0 ){
        return ["result" => false,"data" => $errors];
      }else{
        foreach($request['membres'] as $member) : 
          EvenementMembre::create([
              "evenement_id" => $request['evenement_id'],
              "membre_id" => $member,
              "role" => "participant"
          ]);
        endforeach;
      }
      $data = new Collection;
      return ["result" => true,"data" => $data];        
    }

    protected function formatedModel($model)
    {
      $event = $model->id;
      
      $model->membres = $model->membres->map(function($membre) use ($event) {
          $m =  EvenementMembre::whereMembreIdAndEvenementId($membre->id,$event)->first();
          $membre->role = $m->role;
          $membre->absence = $m->absence;
          return $membre;
      });


      $m = EvenementMembre::whereMembreIdAndEvenementId(Auth::user()->membre->id,$model->id)->first(); 
      // $model->role = $m->role;
      return $model;
    }

    public function eventPresence($data)
    {
      $model = EvenementMembre::whereMembreIdAndEvenementId($data['membre_id'],$data['evenement_id'])->first();
      $model->absence = $data['presence']  == "true" ? 1 : 0;
      $model->save();
      return ['result' => true,'data'=> $model];
    }

    public function deleteParticipant($data)
    {
      $model = EvenementMembre::whereMembreIdAndEvenementId($data['membre_id'],$data['evenement_id'])->first();
      $model->delete();
      return ['result' => true,'data'=> $model];
    }
}