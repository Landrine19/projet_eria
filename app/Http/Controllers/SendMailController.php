<?php

namespace App\Http\Controllers;

use App\Mail\ReunionMail;
use App\Models\Membre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public static function sendMailTo($membresID, $evenement)
    {
        $membres = Membre::whereIn('id',$membresID)->get();
        $membres->each(function($m) use ($evenement){
            Mail::to($m->user->email)->send(new ReunionMail($m->user, $evenement));
        });
    }
}
