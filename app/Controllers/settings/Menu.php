<?php

namespace App\Controllers\settings;
use App\Controllers\BaseController;
use App\Models\Menus;


class Menu extends BaseController
{
  public function index()
  {
    
    $data = array(
        'title' => 'Setting Menu'
    );
    return view('pages/setting_menu',$data);
  }
  public function add()
  {
    $request = \Config\Services::request();
    $menus = new Menus();

    $menu = [
      'name' => strip_tags($request->getPost('menuName')),
      'link' => strip_tags($request->getPost('menuLink')),
      'icon' => strip_tags($request->getPost('menuIcon')),
      'type' => strip_tags($request->getPost('type')),
      'parent' => strip_tags($request->getPost('selectParent'))
    ];
    $menus->insert($menu);
    pp($menu);
  }
}