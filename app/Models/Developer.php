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
    }
    //skills
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
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
