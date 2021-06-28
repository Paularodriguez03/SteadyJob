<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    public function recrutier(){
        return $this->belongsTo(Recruiter::class);
    }

    public function tecno(){
        return $this->hasMany(Tecnology::class);
    }
    public function developers(){
        return $this->belongsToMany(Developer::class);
    }

}
