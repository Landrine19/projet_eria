<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = ['titre','journal','annee_publication','resume','membre_id'];

    public function auteurs()
    {
    	return $this->hasMany(Auteur::class);
    }
    /*public function membres()
    {
    	return $this->belongsToMany(Membre::class);
    }*/
    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
