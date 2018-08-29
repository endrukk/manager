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
     * @param $style:string the script we add to the header
     * @param $in_project:bool true: route from the public/css directory | false: a remote css link
     * @return \Illuminate\Http\Response
     */
    public function setStyle($style, $in_project = true){
        /*TODO*/
        if($in_project && is_string($style) ){
            $this->data['footer_scripts'][] =
                '<link  rel="stylesheet" href="' . asset('/css' . $style) . '"></script>';
        }elseif (!$in_project){
            $this->data['footer_scripts'][] = $style;
        }
    }

    /**
     * Add Css to the header
     *
     * @param $script:string the script we add to the header
     * @param $in_project:bool true: route from the public/js directory | false: a remote js link
     * @param $defer:bool whether or not if we defer the script
     * @return void
     */
    public function setScript($script, $in_project = true, $position = 0, $defer = false){
        /*TODO setting the position of the script*/

        if($in_project && is_string($script) ){
            $this->data['footer_scripts'][] =
                '<script  type="text/javascript" src="' . asset('/js' . $script) . '"></script>';
        }elseif (!$in_project){
            $this->data['footer_scripts'][] = $script;
        }

    }
}
