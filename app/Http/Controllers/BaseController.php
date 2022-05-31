<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use App\Gestion\TreatmentGestion;

class BaseController extends Controller
{
    protected $view = "back.app";
    protected $name;
    protected $model;
    protected $tg;
    protected $ur;
    protected $data;
    protected $headers = [];
    protected $fields = [];
    /**
     * @method constructor
     * @param App\Model
     * @param string $name
    */
    public function __construct($tg,$name)
    {
      //$this->tg = new TreatmentGestion;
      $this->ur = Auth::user()->role;
      $this->view .= $this->ur ?? "su";
      $this->view .= ".$name.browser";
    }

    public function index()
    {
      $view = $this->view.".$this->name.browser";
      $data = $this->tg->all();
      return $this->loadView($view,$data);
    }

    protected function loadView($view,$donnees,$name=NULL)
    {
        $data = new Collection;
        $data->modelName = $name ?? $this->name;
        $data->fields = $this->fields;
        $data->donnees = $donnees;
        $data->headers = $this->headers;
        return view($view,compact('data'));
    }

    public function create(Request $request)
    {
      // return response()->json(["success" => [],"message" => "","response_data" => []],201);
      $data = $this->tg->create($request->all());
      $message = $data["result"] ? $this->name." enregistré avec succès" : "";
      return response()->json(["success" => $data["result"],"message" => $message,"response_data" => $data['data']],201);
    }

    public function update(Request $request)
    {
      $data = $this->tg->update($request->all(),$request->hidden_id);
      $message = $data["result"] ? $this->name." mis à jour avec succès" : "";
      return response()->json(["success" => $data["result"],"message" => $message,"response_data" => $data['data']],201);
    }

    public function edit($id)
    {

      $data = $this->tg->one($id);
      return response()->json(["success" => $data["result"],"response_data" => $data],201);
    }

    public function delete($id)
    {
      $data = $this->tg->delete("force",$id);
      return response()->json(["success" => $data["result"],'message' => "Supprimé avec succès"],201);
    }

    public function single($id)
    {
      $view = $this->view.".$this->name.single";
      $data = $this->tg->one($id);
      return $this->loadView($view,$data);
    }

}
