<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;


    public function getCreatedAtAttribute($vale)
    {
        return Carbon::parse($vale)->locale('fr')->isoFormat('lll');
    }
}
