<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Menu;
use App\Models\MenuItem;
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
    public function getList(){
        $this->data['page_name'] = 'Menus list';

        $menus = DB::table('menus AS m')
            ->join('roles AS r', 'r.id', '=', 'm.role_id')
            ->select('m.id','m.name','m.is_front AS front','m.active','m.created_at AS created', 'm.updated_at AS updated', 'r.name AS role')
            ->get();


        foreach ($menus as &$menu){

            $menu->created = date('Y m d',strtotime($menu->created));
            $menu->updated = date('Y m d',strtotime($menu->updated));

            $menu->actions[] = array(
                'name' => 'Edit',
                'icon' => 'fas fa-edit',
                'route' => route('admin.menu.edit', $menu->id),
            );
            $menu->actions[] = array(
                'name' => ((intval($menu->active) == 0) ? 'Activate': 'Deactivate'),
                'icon' => 'fas fa-power-off',
                'route' => route('admin.menu.activation', $menu->id),
            );
            $menu->actions[] = array(
                'name' => 'Delete',
                'icon' => 'fas fa-trash-alt',
                'route' => route('admin.menu.delete', $menu->id),
            );

        }

        $this->data['table_content'] = $menus;

        return view('admin.menus.list', $this->data);
    }
    /**
     * edit a given menu item
    */
    public function edit($id){
        $this->setScript('<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', false);
        $this->setScript('/jquery-ui-1.12.1.custom/jquery-ui.min.js');
        $this->setScript('/admin/main.js');

        $menus = Menu::getMenuByID(intval($id));
        $this->data['menuItems'] = MenuItem::all();

//        echo '<pre>';
//        die(var_dump(
//            $menus
//        ));

        return view('admin.menus.edit', $this->data);
    }

    /**
     * delete a given menu item
    */
    public function delete(){

    }

    /**
     * toggle item activation
     * @var $id:int the id of the menu item to deactivate
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function activation($id){
        $menu = Menu::find($id);
        $menu->active = !intval($menu->active);
        $menu->save();

        return redirect(route('admin.menu.list'));
    }
}
