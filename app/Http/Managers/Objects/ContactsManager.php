<?php 


namespace App\Http\Managers\Objects;
use App\Http\Managers\TreatmentManager;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactsManager extends TreatmentManager
{
    public function __construct()
    {
        $this->model = new Contact;
        $this->rules = [
            'typecontact_id' => 'required',
            'contact' => 'required'
        ];
    }

    protected function otherTreatment($data)
    {
        $data["membre_id"] = Auth::user()->membre->id;
        return $this->unsetTheUnavailable($data,['hidden_id']);
    }
}