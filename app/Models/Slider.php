<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($vale)
    {
        return \Carbon\Carbon::parse($vale)->locale('fr')->isoFormat('lll');
    }
}
