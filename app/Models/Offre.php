<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = ["type","titre","debut","fin","description",'photo','membre_id'];

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
