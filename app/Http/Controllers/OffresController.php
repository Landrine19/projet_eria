<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Managers\Objects\OffresManager;  


class OffresController extends BaseController
{
    //
    public function __construct()
    {
        $this->tg = new OffresManager;
        $this->name = "offres";  
    }
}
