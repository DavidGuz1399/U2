<?php

use Illuminate\Database\Seeder;
use U2\Role;
use U2\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin=Role::where('name','administrador')->first();
        $user=new User();
        $user->name='David Felipe Guzman Casas';
        $user->user_name="David1399";
        $user->email='david@gmail.com';
        $user->password=bcrypt('davidU2');
        $user->city="Bogota";
        $user->slug="Admin".time();
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
