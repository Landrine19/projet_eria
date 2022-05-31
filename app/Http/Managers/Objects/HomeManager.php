<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\User;
use App\Models\Publication;
use App\Models\Projet;
use App\Models\Evenement;
use App\Models\Offre;
use App\Models\Membre;
use App\Models\Partenaire;
use App\Models\Section;
use App\Models\Slider;
use App\Models\Typeevenement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new User;
        $this->rules = [];
    }

    public function getHomeData()
    {   
        $type = Typeevenement::whereLibelle("REUNION")->first();

        return array(
            "events" => Evenement::where('typeevenement_id','!=',$type->id)
                                  ->where('date_evenement','>',Carbon::now())   
                                  ->latest()->take(4)->get(),
            "projects" => Projet::whereStatut('Terminé')->latest()->take(4)->get(),
            "offres" => Offre::where('fin','>',Carbon::now())   
                                ->latest()->take(4)->get(),
            "publications" => Publication::latest()->take(4)->get(),
            "partenaires" => Partenaire::latest()->take(4)->get(),
            "slides" => Slider::all(),
            "about" => Section::whereName('about')->first() 
        );
    }

    public function getPublications()
    {
        return Publication::paginate(6);
    }
    

    public function getProjects()
    {   
         return Projet::whereStatut('Terminé')
                       // ->where('fin','>',Carbon::now())   
                        ->latest()
                        ->paginate(6);
    }

    public function getSingleMember($id)
    {
        return Membre::find($id);  
    }

    public function getSingleEvent($id)
    {
        return Evenement::find($id);  
    }

    public function getSingleOffer($id)
    {
        return Offre::find($id);  
    }

    public function getSinglePublication($id)
    {
        return Publication::find($id);  
    }

    public function getSingleProject($id)
    {
        return Projet::find($id);  
    }

    public function getEvents()
    {
       $type = Typeevenement::whereLibelle("REUNION")->first();

        return Evenement::where('typeevenement_id','!=',$type->id)
                        ->where('date_evenement','>',Carbon::now())   
                        ->latest()->paginate(6);
    }

    public function getAboutData()
    {
         $data = new Collection;
         $data->aboutSection = Section::whereName('about')->first();   
         $data->members = Membre::take(6)->get();
         return $data;
    }

    public function getOffres()
    {
        return Offre::where('fin','>',Carbon::now())->paginate(6);
    }

    public function getMembers()
    {
        return Membre::paginate(6);
    }

    protected function otherTreatment($data)
    {
        $data["password"] = Hash::make($data['password']);
        return $this->unsetTheUnavailable($data,['hidden_id','password_confirmation']);
    }
}