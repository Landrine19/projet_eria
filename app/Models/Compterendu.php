<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compterendu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function rubriques()
    {
        return $this->hasMany(Rubrique::class);
    }
}
