<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function membres()
    {
    	return $this->hasMany(Membre::class);
    }

    public function getCreatedAtAttribute($vale)
    {
        return Carbon::parse($vale)->locale('fr')->isoFormat('lll');
    }
}
