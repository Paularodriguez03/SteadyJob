<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creacion de los roles
        $roleAdmin =  Role::create(['name'=>"Admin"]);
        $roleRec = Role::create(['name'=>'Recruiter']);
        $roleDev = Role::create(['name'=>'Developer']);


        //creación del permiso y asignarlo a un rol
        //Permission::create(['name'=>'companydata'])->assignRole($roleAdmin);
        //creación del permiso y asignación a varios roles
        Permission::create(['name'=>'companydata'])->syncRoles([$roleAdmin, $roleRec]);
        Permission::create(['name'=>'developerdata'])->syncRoles([$roleAdmin, $roleDev]);

        


        
    }
}
