<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Managers\Objects\UsersManager;
use App\Models\Poste;
use App\Models\Typecontact;
use Auth;

class UsersController extends BaseController
{
    public function __construct()
    {
        $this->tg = new UsersManager;
        $this->name = "home";
    }

    //
    public function dashboard()
    {
       $data = $this->tg->boardInfo(); 
       return view('back.app.dashboard',compact('data'));
    }

    public function profile()
    {
        $data = $this->tg->one(Auth::user()->id);
        $data->typeposte = Poste::all();
        $data->typecontacts = Typecontact::all();
        return view('back.app.profile',compact('data'));
    }

    public function profileUpdate(Request $request)
    {
        $data = $this->tg->updateUserProfile($request);
        return back()->with($data->toArray());
    }

    public function profileUpdating(Request $request)
    {
        $data = $this->tg->updating($request);
        return back()->with($data->toArray());
    }

    public function addPoste(Request $request)
    {
        $data = $this->tg->addPoste($request->all());
        $message = "";
        if($data["result"]): 
            $message = "Poste enregistré avec succès";
        endif;    
        return response()->json(["success" => $data["result"],"message" => $message,"response_data" => $data['data']],201);
    }
    public function deletePoste(Request $request)
    {
        
    }

    public function editPoste($id)
    {
        $data = $this->tg->editPoste($id);
        return response()->json(["success" => $data["result"],"response_data" => $data],201);  
    }
}
