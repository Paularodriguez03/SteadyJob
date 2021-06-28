<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'desarrollador',
            'email' => 'desarrollador@gmail.com',
            'password' => '$2y$10$JY4JeoZZ9sjSCWHff05jy.YEq9OgqukBwWH12RT2nod8oRMJ83TnK',
        ])->assignRole('Developer');
        

        User::create([
            'name' => 'empresa',
            'email' => 'empresa@gmail.com',
            'password' => '$2y$10$JY4JeoZZ9sjSCWHff05jy.YEq9OgqukBwWH12RT2nod8oRMJ83TnK',
        ])->assignRole('Recruiter');



    }
}
