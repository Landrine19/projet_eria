<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typecontact extends Model
{
    use HasFactory;

    protected $fillable = ['intitule'];

    public function contacts()
    {
    	return $this->hasMany(Contact::class);
    }

    public function getCreatedAtAttribute($vale)
    {
        return Carbon::parse($vale)->locale('fr')->isoFormat('lll');
    }
}
