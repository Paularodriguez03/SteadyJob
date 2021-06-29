<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
        //donde un registro pertenece a otro registro uno a uno
        //developer y user tiene una relacion de uno a uno
    }
    //skills
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
        //belongsToMany -> relacion de muchos
        //muchos developers tienen muchas skills
    }
    //education
    public function education(){
        return $this->belongsToMany(Education::class);
    }
    //technologies
    public function tecnologies(){
        return $this->belongsToMany(Tecnology::class);
    }
    //vacancies
    public function vacancies(){
        return $this->belongsToMany(Vacancy::class);
    }
}
