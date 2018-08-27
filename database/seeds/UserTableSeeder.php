<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_employee = Role::where('name', 'employee')->first();
        $role_manager  = Role::where('name', 'manager')->first();
        $role_user  = Role::where('name', 'user')->first();

        $employee = new User();
        $employee->name = 'Employee Name';
        $employee->email = 'employee@example.com';
        $employee->password = bcrypt('secret');
        $employee->role_id = $role_employee->id;
        $employee->save();


        $manager = new User();
        $manager->name = 'Manager Name';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('secret');
        $manager->role_id = $role_manager->id;
        $manager->save();

        $manager = new User();
        $manager->name = 'User Name';
        $manager->email = 'user@example.com';
        $manager->password = bcrypt('secret');
        $manager->role_id = $role_user->id;
        $manager->save();

        $manager = new User();
        $manager->name = 'Admin Name';
        $manager->email = 'admin@admin.com';
        $manager->password = bcrypt('secret');
        $manager->role_id = $role_admin->id;
        $manager->save();
    }
}
