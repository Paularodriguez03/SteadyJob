<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    use HasFactory;

    public function vacancy()
    {
        return $this->belongsToMany(Vacancy::class);
    }
    public function developer()
    {
        return $this->belongsToMany(Developer::class);
    }
}
