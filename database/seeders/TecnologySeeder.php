<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tecnology;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologie = [
            "Java",
            "Javascript",
            "Python",
            "C++",
            "C",
            "SQL",
            "Mysql",
            "AWK",
            "C#",
            "R",
            "TypeScript",
            "PHP"
        ];
        foreach($tecnologie as $tecno){
            Tecnology::create([
                'tecno' => $tecno,
            ]);
        }
        }
}
