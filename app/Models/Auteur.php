<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prenoms','publication_id'];

    public function publication()
    {
    	return $this->belongsTo(Publication::class);
    }
}
