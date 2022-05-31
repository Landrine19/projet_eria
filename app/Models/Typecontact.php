<?php

namespace App\Models;

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
}
