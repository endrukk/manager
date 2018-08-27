<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminMenuController extends AdminController
{

    public function __construct()
    {
        $this->page_name = 'Manage Menus';
    }

    /**
     * Main
     *
     * @return \Illuminate\Http\Response
     */
    public function init()
    {
        parent::init();

        return view('dashboard', $this->data);
    }

    /**
     * Generate the list of every model
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getList($actions = false){
        $this->data['page_name'] = 'Menus list';

        $menus = DB::table('menus AS m')
            ->join('roles AS r', 'r.id', '=', 'm.role_id')
            ->select('m.id','m.name','m.is_front AS front','m.active','m.created_at AS created', 'm.updated_at AS updated', 'r.name AS role')
            ->get();


        foreach ($menus as &$menu){

            $menu->created = date('Y m d',strtotime($menu->created));
            $menu->updated = date('Y m d',strtotime($menu->updated));

        }

        $this->data['table_content'] = $menus;

        return view('admin.menus.list', $this->data);
    }
}
