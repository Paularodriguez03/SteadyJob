<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\Developer;


class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            "trabajo en equipo",
            "liderazgo",
            "creatividad",
            "innovación",
            "pensamiento critico",
            "resolución de problemas",
            "comunicación efectiva",
            "adaptabilidad",
            "autonomia",
            "colaboración",
            "inteligencia emocional",
            "iniciativa"
        ];
        foreach($skills as $skill){
            Skill::create([
                'skillName' => $skill,
            ]);
        }
        //creacion de los skills que van precargados en la base de datos

    }
}
