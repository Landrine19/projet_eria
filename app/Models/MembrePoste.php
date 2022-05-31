<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembrePoste extends Model
{
    protected $table = "membre_poste";
    use HasFactory;

    protected $fillable = ['membre_id','poste_id','debut','fin'];


    public function poste()
    {
    	return $this->belongsTo(Poste::class);
    }
    public function membre()
    {
    	return $this->belongsTo(Membre::class);
    }
}
