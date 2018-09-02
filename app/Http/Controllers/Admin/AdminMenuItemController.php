<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class AdminMenuItemController extends AdminController
{

    private $menuValidation =
        [
            'menu' => 'required',
            'name' => 'required|string|max:255|unique:menus',
            'type' => 'required',
            'role' => 'required',
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
     * insert or update a given menu item
     */
    public function process(Request $request)
    {
        $menuID = intval($request->input('id'));

//        $request->validate($this->menuValidation);

        $name = $request->input('name');
        $route = $request->input('route');
        $link = $request->input('link');
        $target = intval($request->input('target'));
        $nofollow = intval($request->input('nofollow'));


        if ($menuID === 0) {
            /* Create new menu */
            $newMenuItem = new MenuItem();
            $newMenuItem->name = $name;
            $newMenuItem->route = $route;
            $newMenuItem->link = $link;
            $newMenuItem->target = $target;
            $newMenuItem->nofollow = $nofollow;
            $newMenuItem->save();
            $menuID = $newMenuItem->id;
        }

        /*TODO: if ajax, return different, else return simething else*/

        return redirect(route('admin.menu.edit', $menuID));
    }
}
