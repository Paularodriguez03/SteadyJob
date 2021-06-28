<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crea un array con las carreras y los niveles
        $careers = array(
            "Administración y Negocios",
            "Arquitectura",
            "Artes Visuales",
            "Ciencia",
            "Ciencias Ambientales",
            "Ciencias de la Salud",
            "Ciencias Económicas",
            "Ciencias Políticas",
            "Ciencias Sociales",
            "Comunicación Social",
            "Derecho",
            "Diseño Gráfico",
            "Diseño Industrial",
            "Diseño UI/UX",
            "Ingeniería Civil",
            "Ingeniería Eléctrica",
            "Ingeniería Electrónica",
            "Ingeniería Industrial",
            "Ingeniería Mecánica",
            "Ingeniería Mecatrónica",
            "Ingeniería Química",
            "Ingeniería Sistemas",
            "Marketing y Públicidad",
            "Otra",
            "Profesional en ventas",
            "Psícología"
        );
        $levels = array(
            "Sin estudios",
            "Bachiller",
            "Técnico ó Tecnologo",
            "Carrera tecnológica",
            "Profesional",
            "Especialización",
            "Maestría",
            "Doctorado"
        );

        foreach ($careers as $career) {
            foreach ($levels as $level) {
                Education::create([
                    'nameEducation' => $career,
                    'level' => $level,
                ]);
            }
        }
    }
}
