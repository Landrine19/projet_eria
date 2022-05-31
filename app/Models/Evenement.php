<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = ['intitule','lieu','date_evenement','typeevenement_id','resume'];

    public function typeevenement()
    {
    	return $this->belongsTo(Typeevenement::class);
    }

	public function membres()
    {
    	return $this->belongsToMany(Membre::class)
                    ->withPivot('absence', 'role', 'justificatif');
    }
    
    public function fichiers()
    {
        return $this->hasMany(Fichier::class);
    }

    public function compterendus()
    {
        return $this->hasMany(Compterendu::class);
    }

}
