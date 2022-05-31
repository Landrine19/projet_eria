<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['membre_id','typecontact_id','contact'];
    public function membre()
    {
    	return $this->belongsTo(Membre::class);
    }
     public function typecontact()
    {
    	return $this->belongsTo(Typecontact::class);
    }
}
