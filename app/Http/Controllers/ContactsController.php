<?php

namespace App\Http\Controllers;

use App\Http\Managers\Objects\ContactsManager;
use Illuminate\Http\Request;

class ContactsController extends BaseController
{
    //
    public function __construct()
    {
        $this->tg = new ContactsManager;
        $this->name = "contact";
    }
}
