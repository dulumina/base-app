<?php

namespace App\Controllers\settings;
use App\Controllers\BaseController;

class Menu extends BaseController
{
  public function index()
  {
    
    $data = array(
        'title' => 'Dashboard'
    );
    return view('pages/setting_menu',$data);
  }
}