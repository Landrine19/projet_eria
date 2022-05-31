<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Managers\Objects\TachesManager;  


class TachesController extends BaseController
{
    //
    public function __construct()
    {
        $this->tg = new TachesManager;
        $this->name = "taches";  
    }
}
