<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getCreatedAtAttribute($vale)
    {
        return Carbon::parse($vale)->locale('fr')->isoFormat('lll');
    }
}
