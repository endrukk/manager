<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;

class AdminHomeController extends AdminController
{

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
}
