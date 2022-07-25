<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function member_in($user_id)
    {
        $db      = \Config\Database::connect();
        $groups = $db->table('groups');

        return $groups->select("groups.*")->join("group_members","group_members.group_id=groups.group_id","INNER")
                      ->where(['user_id' => $user_id])
                      ->get()
                      ->getResult();
    }

    public function allowed_menus($user_id)
    {
        return $this->join("group_members","group_members.user_id=Users.user_id","Inner")
                    ->join("access_menus","access_menus.group_id=group_members.group_id","INNER")
                    ->join("Menus","Menus.menu_id=access_menus.menu_id","Inner")
                    ->select("Menus.*,MAX(access_menus.c) as c ,MAX(access_menus.r) as r ,MAX(access_menus.u) as u ,MAX(access_menus.d) as d ")
                    ->where(['Users.user_id'=>$user_id])
                    ->groupBy('Menus.menu_id')
                    ->orderBy('Menus.menu_id','ASC')
                    ->get()->getResult();

    }
}
