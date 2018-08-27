<?php

namespace App\Models;

use App\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Menu extends Model
{

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class);
    }

    public function role()
    {
        return $this->hasMany(Role::class);
    }

    /**
     * Selects and generates the user menu
     *
     * @param is_front:boolean|bool:false
     * @return menu:string|bool:false
     */
    public function getUserMenu($is_front = true){


        $result = DB::table('menus AS m')
            ->join('menu_menu_item AS mmi', 'm.id', '=', 'mmi.menu_id')
            ->join('menu_items AS mi', 'mi.id', '=', 'mmi.menu_item_id')
            ->select('mi.id', 'mi.name', 'route', 'link', 'target', 'nofollow', 'parent_id')
            ->where( [
                ['m.role_id', intval(Auth::user()->role_id )],
                ['m.is_front', intval($is_front)],
                ['m.active', 1],
                ])
            ->get();


        $menu = false;
        if(sizeof($result) > 0){
            $menu = array();
            foreach ($result as $row){

                if(Route::has($row->route))
                    $row->url = route($row->route);
                elseif ($row->link != '')
                    $row->url = $row->link;
                else
                    $row->url = '#';

                if($row->parent_id != NULL){
                    $menu[$row->parent_id]->children[] = $row;
                }else{
                    if( !isset($menu[$row->id]) ) {
                        /*if menu[i] is a parent of some other menu item, it will exist,
                        if the menu item does not exist we add it to the return variable
                        */
                        $menu[$row->id] = $row;
                    }else {
                        /* we have menu with index i, but it only contains the submenu items
                        we add the menu item parameters from the query to the return variable*/

                        $menu[$row->id]->id = $row->id;
                        $menu[$row->id]->name = $row->name;
                        $menu[$row->id]->route = $row->route;
                        $menu[$row->id]->link = $row->link;
                        $menu[$row->id]->url = $row->url;
                        $menu[$row->id]->target = $row->target;
                        $menu[$row->id]->nofollow = $row->nofollow;
                    }
                }
            }
        }

        return $menu;
    }
    /**
     * Selects and generates the full menu by id
     *
     * @param is_front:boolean|bool:false
     * @return string:menu | bool:false
     */
    public static function getMenuByID($id){



        $result = DB::table('menus AS m')
            ->join('menu_menu_item AS mmi', 'm.id', '=', 'mmi.menu_id')
            ->join('menu_items AS mi', 'mi.id', '=', 'mmi.menu_item_id')
            ->select('*')
            ->where( 'm.id', $id)
            ->get();


        $menu = false;
        if(sizeof($result) > 0){
            $menu = array();
            foreach ($result as $row){

                if(Route::has($row->route))
                    $row->url = route($row->route);
                elseif ($row->link != '')
                    $row->url = $row->link;
                else
                    $row->url = '#';

                if($row->parent_id != NULL){
                    $menu[$row->parent_id]->children[] = $row;
                }else{
                    if( !isset($menu[$row->id]) ) {
                        /*if menu[i] is a parent of some other menu item, it will exist,
                        if the menu item does not exist we add it to the return variable
                        */
                        $menu[$row->id] = $row;
                    }else {
                        /* we have menu with index i, but it only contains the submenu items
                        we add the menu item parameters from the query to the return variable*/

                        $menu[$row->id]->id = $row->id;
                        $menu[$row->id]->name = $row->name;
                        $menu[$row->id]->route = $row->route;
                        $menu[$row->id]->link = $row->link;
                        $menu[$row->id]->url = $row->url;
                        $menu[$row->id]->target = $row->target;
                        $menu[$row->id]->nofollow = $row->nofollow;
                    }
                }
            }
        }

        return $menu;
    }
}
