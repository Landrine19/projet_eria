<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Managers\Objects\EvenementsManager;
use App\Jobs\SendEmail;
use App\Models\Evenement;
use App\Models\EvenementMembre;
use App\Models\Information;
use App\Models\Membre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EvenementsController extends BaseController
{
    //
    public function __construct()
    {
        $this->tg = new EvenementsManager;
        $this->name = "evenements";
    }

    public function resumeEvent(Request $request)
    {
        $data = $this->tg->resumeEvent($request->all());
        $message = "Résumé ajouté avec succès";
        return response()->json(["success" => $data["result"], "message" => $message, "response_data" => $data['data']], 201);
    }

    public function addParticipant(Request $request)
    {
        $data = $this->tg->addParticipant($request->all());
        $message = "Participant enregistré avec succès";
        return response()->json(["success" => $data["result"], "message" => $message, "response_data" => $data['data']], 201);
    }

    public function ajouterParticipant(Request $request)
    {
        $data = [];
        $request->validate([
            'evenement_id' => 'required|integer|exists:evenements,id',
            'membres.*' => 'required|integer|exists:membres,id'
        ]);

        $evenement = Evenement::find($request->evenement_id);
        $membres = $request->membres;
        $val = [];
        for ($i = 0; $i < count($membres); $i++) {
            $val[$membres[$i]] =  ['absence' => 0, 'role' => 'participant', 'created_at' => Date::now(), 'updated_at' => Date::now()];
        }

        $evenement->membres()->attach($val);

        // SendMailController::sendMailTo($membres, $evenement);
        SendEmail::dispatch($membres, $evenement);

        $data = ["result" => true, "data" => new Collection()];
        $message = "Participant enregistré avec succès";
        
        return response()->json(["success" => $data["result"], "message" => $message, "response_data" => $data['data']], 201);
    }

    protected function loadView($view, $donnees, $name = NULL)
    {
        $data = new Collection;
        $data->modelName = $name ?? $this->name;
        $data->fields = $this->fields;
        $data->donnees = $donnees;
        $data->membres = collect(Membre::all())->keyBy('id');
        $data->headers = $this->headers;
        return view($view, compact('data'));
    }

    public function presenceEvent(Request $request)
    {
        $data = $this->tg->eventPresence($request->all());
        $message = "Présence enregistré avec succès";
        return response()->json(["success" => $data["result"], "message" => $message, "response_data" => $data['data']], 201);
    }

    public function deleteParticipant(Request $request)
    {
        $data = $this->tg->deleteParticipant($request->all());
        $message = "Participant enlevé avec succès";
        return response()->json(["success" => $data["result"], "message" => $message, "response_data" => $data['data']], 201);
    }

    public function justifier(Request $request)
    {
        $request->validate([
            'justification' => 'required'
        ]);

        $ev = EvenementMembre::where('evenement_id', $request->evenement_id)
        ->where('membre_id', $request->membre_id)
        ->first();
        $ev->justificatif = $request->justification;
        $ev->absence = 1;
        $ev->save();

        return redirect()->back()->with('justifier', 'Justification effectuée');
    }

    public function present($membre_id, $evenement_id)
    {
        $ev = EvenementMembre::where('evenement_id', $evenement_id)
        ->where('membre_id', $membre_id)->first();
        $ev->absence = 0;
        $ev->save();
        return redirect()->back();
    }

    public function aff_reunions()
    {
        $infos = new Collection;
        $infos->email = Information::whereTitle('email')->first();
        $infos->phone = Information::whereTitle('phone')->first();
        $infos->logo = Information::whereTitle('logo')->first();

        $reunions = Evenement::where('typeevenement_id', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('site.reunions.single', [
            'infos' => $infos,
            'reunions' => $reunions
        ]);
    }

    public function browseReunion($id)
    {
        $reunion = Evenement::find($id);

        return view('site.reunions.browse', ['reunion' => $reunion, 'infos' => $this->getInfo()]);
    }

    public function getInfo()
    {
        $infos = new Collection;
        $infos->email = Information::whereTitle('email')->first();
        $infos->phone = Information::whereTitle('phone')->first();
        $infos->logo = Information::whereTitle('logo')->first();

        return $infos;
    }
}

