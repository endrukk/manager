<?php

use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use App\Role;

class MenuItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menItem = new MenuItem();
        $menItem->name = 'Home';
        $menItem->route = 'home';
        $menItem->save();
        
        $menItem = new MenuItem();
        $menItem->name = 'Dashboard';
        $menItem->route = 'admin';
        $menItem->save();
        
    }
}
