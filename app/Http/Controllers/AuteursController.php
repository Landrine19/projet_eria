<?php

namespace App\Http\Controllers;

use App\Http\Managers\Objects\AuteursManager;
use Illuminate\Http\Request;

class AuteursController extends BaseController
{
    //
    public function __construct()
    {
        $this->tg = new AuteursManager;
        $this->name = "auteurs";  
    }
}
