<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMenuItemController extends AdminController
{

    private $menuItemsPerPage = 20;

    private $menuItemValidation =
        [
            'name' => 'required|string|max:255',
            'link_type' => 'required',
            'uri' => 'required',
        ];

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
     * Generate the list of every menu item
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    /*TODO: Paginate, or search, order by*/
    public function getList($page = 0)
    {

        $this->data['page_name'] = 'Menus Items list';


        $this->data['menu_items'] = DB::table('menu_items AS mi')
            ->skip($page * $this->menuItemsPerPage)
            ->take($this->menuItemsPerPage)
            ->select('mi.*')
            ->get();

        foreach ($this->data['menu_items'] as &$item) {

            $item->created_at = date('Y m d', strtotime($item->created_at));
            $item->updated_at = date('Y m d', strtotime($item->updated_at));


            $item->actions[] = array(
                'name' => 'Edit',
                'icon' => 'fas fa-edit',
                'route' => route('admin.menu.edit', $item->id),
            );
            $item->actions[] = array(
                'name' => 'Delete',
                'icon' => 'fas fa-trash-alt',
                'route' => route('admin.menu.delete', $item->id),
            );

        }

        return view('admin.menu_items.list', $this->data);
    }

    /**
     * insert or update a given menu item
     */
    public function process(Request $request)
    {
        $menuID = intval($request->input('id'));

        $request->validate($this->menuItemValidation);

        $name = $request->input('name');
        $uri = $request->input('uri');
        $link_type = $request->input('link_type');
        $target = intval($request->input('target'));
        $nofollow = intval($request->input('nofollow'));

        $ajax = intval($request->input('ajax'));

        if ($menuID === 0) {
            /* Create new menu */
            $newMenuItem = new MenuItem();
            $newMenuItem->name = $name;

            if($link_type == 1)
                $newMenuItem->route = $uri;
            else
                $newMenuItem->link = $uri;

            $newMenuItem->target = $target;
            $newMenuItem->nofollow = $nofollow;
            $newMenuItem->save();
        }

        /*TODO: if ajax, return different, else return something else*/


        if($ajax === 1){
            return json_encode(array(
                'id' => $newMenuItem->id,
                'name' => $newMenuItem->name
            ));
            exit(0);
        }else{
            return redirect(route('admin.menu_item.list', $menuID));
        }
    }

    /**
     * @return int
     */
    public function getMenuItemsPerPage()
    {
        return $this->menuItemsPerPage;
    }

    /**
     * @param int $menuItemsPerPage
     */
    public function setMenuItemsPerPage($menuItemsPerPage)
    {
        $this->menuItemsPerPage = $menuItemsPerPage;
    }

}
