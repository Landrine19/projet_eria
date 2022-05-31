<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenoms','sexe','telephone','email','specialite','annee_entree','user_id'];

    public function postes()
    {
    	return $this->belongsToMany(Poste::class);
    }
    public function publications()
    {
    	return $this->hasMany(Publication::class);
    }
    public function evenements()
    {
    	return $this->belongsToMany(Evenement::class);
    }
    public function projets()
    {
    	return $this->hasMany(Projet::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function contacts()
    {
    	return $this->hasMany(Contact::class);
    }
    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

}
