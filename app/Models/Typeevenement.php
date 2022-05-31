<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeevenement extends Model
{
    use HasFactory;
    protected $fillable = ['libelle'];

    public function evenements()
    {
    	return $this->hasMany(Evenement::class);
    }
}
