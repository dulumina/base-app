<?php

namespace App\Controllers\settings;
use App\Controllers\BaseController;
use App\Models\Groups;


class Group extends BaseController
{
  public function index()
  {
    
    $data = array(
        'title' => 'Setting Group'
    );
    $groups = new Groups();
    $groups->select("groups.* ,count(group_members.id) members")
           ->join('group_members','group_members.group_id=groups.group_id','LEFT')
           ->groupBy('groups.group_id');
    $data['group_list'] = $groups->findAll();
    $data['menus'] = json_decode($_SESSION['user_data'])->acess_menu;
    // pp($data['menus']);
    return view('pages/setting_group',$data);
  }
  public function add()
  {
    $request = \Config\Services::request();
    $groups = new Groups();

    $group = [
      
    ];
    $groups->insert($group);
    pp($group);
  }
}