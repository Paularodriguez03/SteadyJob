<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    public function recrutier(){
        return $this->belongsTo(Recruiter::class);
        //una vacante tiene un reclutador
    }

    public function tecno(){
        return $this->hasMany(Tecnology::class);
        //una vacante tiene varias tecnologías
    }
    public function developers(){
        return $this->belongsToMany(Developer::class);
        //muchas vacanates tiene muchos developers
    }

}
