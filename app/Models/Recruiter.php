<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
        //belongsTo de uno a uno
        //un reclutador tiene un solo usuario
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
        //de uno a muchos
        //un reclutador tiene muchas vacantes
    }
}
