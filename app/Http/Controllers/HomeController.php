<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Managers\Objects\HomeManager;
use App\Models\Information;
use Illuminate\Support\Collection;

class HomeController extends BaseController
{
    
    //
    public function __construct()
    {
        $this->tg = new HomeManager;
        $this->name = "home";  
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->returnView('welcome',$this->tg->getHomeData());
    }

    public function about()
    {
        $data = $this->tg->getAboutData();
        return $this->returnView('about',$data);
    }
     public function contact(){
        return $this->returnView('contact');
     }

      public function publications(){
        return $this->returnView('publication',$this->tg->getPublications());
      }

      public function projets()
      {
        return $this->returnView('projet',$this->tg->getProjects());
      }

      public function evenements()
      {
        return $this->returnView('evenement',$this->tg->getEvents());
      }

      public function offres()
      {
        return $this->returnView('offre',$this->tg->getOffres());
      }

      public function annuaire()
      {
        return $this->returnView('annuaire',$this->tg->getMembers());
      }

      private function returnView($name,$data = NULL)
      {
        $infos = new Collection;
        $infos->email = Information::whereTitle('email')->first();
        $infos->phone = Information::whereTitle('phone')->first();
        $infos->logo = Information::whereTitle('logo')->first();
        return view('site.'.$name,compact('data','infos'));
      }

      public function memberSingle($id)
      {
        return $this->returnView('annuaire.single',$this->tg->getSingleMember($id)); 
      }

      public function evenementsSingle($id)
      {
        return $this->returnView('evenement.single',$this->tg->getSingleEvent($id)); 
      }

      public function projetsSingle($id)
      {
        return $this->returnView('projet.single',$this->tg->getSingleProject($id)); 
      }

      public function offresSingle($id)
      {
        return $this->returnView('offre.single',$this->tg->getSingleOffer($id)); 
      }

      public function publicationsSingle($id)
      {
        return $this->returnView('publication.single',$this->tg->getSinglePublication($id)); 
      }
}
