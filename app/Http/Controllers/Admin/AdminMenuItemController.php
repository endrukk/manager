<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class AdminMenuItemController extends AdminController
{

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
}
