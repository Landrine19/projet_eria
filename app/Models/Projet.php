<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = ['titre','statut','debut','fin','description','membre_id'];

    public function membre()
    {
        return  $this->belongsTo(Membre::class);
    }
}
