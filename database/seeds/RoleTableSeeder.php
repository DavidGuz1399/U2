<?php

use Illuminate\Database\Seeder;
use U2\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=new Role();
        $role->name="administrador";
        $role->description="Editar todos los datos de los usuarios incluidos pasatiempos favoritos y perfil";
        $role->save();
        
        $role=new Role();
        $role->name="usuario";
        $role->description="Seleccionar o agregar pasatiempos favoritos tantos como desee a su cuenta";
        $role->save();
    }
}
