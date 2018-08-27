<?php

/**
 * This is the main admin controller
 * Every other home controller is the extension of this
*/

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $data = array();
    public $page_name = 'Dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Initialize the Controller
     *
     */
    public function init()
    {
        $this->data['page_name'] = $this->page_name;
        if (Auth::user()){
            $menu = new Menu();
            $this->data['menu'] = $menu->getUserMenu(0);

        }
    }


    /**
     * Add Css to the header
     *
     * @param $style:string the script we add to the header, route from the public/css directory
     * @return \Illuminate\Http\Response
     */
    public function setStyle($style){
        /*TODO*/
    }

    /**
     * Add Css to the header
     *
     * @param $script:string the script we add to the header, route from the public/js directory
     * @return \Illuminate\Http\Response
     */
    public function setScript($script){
        /*TODO*/
    }
}
