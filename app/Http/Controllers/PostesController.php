<?php

namespace App\Http\Controllers;

use App\Http\Managers\Objects\PostesManager;
use Illuminate\Http\Request;

class PostesController extends BaseController
{
    //
    public function __construct()
    {
        $this->tg = new PostesManager;
        $this->name = "postes";
    }
}
