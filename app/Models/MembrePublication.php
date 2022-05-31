<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembrePublication extends Model
{
    use HasFactory;

    protected $fillable = ['membre_id','publication_id'];

    public function publication()
    {
    	return $this->belongsTo(Publication::class);
    }
    public function membre()
    {
    	return $this->belongsTo(Membre::class);
    }
}
