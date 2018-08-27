<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Role;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $menuItems  = MenuItem::all();

        $menu = new Menu();
        $menu->name = 'Admin dashboard';
        $menu->active = true;
        $menu->role_id = $role_admin->id;
        $menu->save();
        $menu->menuItems()->attach($menuItems);

    }
}
