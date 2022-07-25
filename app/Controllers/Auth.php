<?php

namespace App\Controllers;
use App\Models\Users;
use App\Models\Groups;
use App\Models\Logins;
// use App\Libraries\session_storage;

class Auth extends AuthController
{
    public function index()
    {
        return view('login');
    }

    public function login($data=[])
    {
      switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
          return view('login',$data);
          break;
        
        case 'POST':
          // dd($_POST);
          return $this->prc_login();
          break;
        
        default:
          return view('login',$data);
          break;
      };
    }
    public function logout()
    {
      session()->destroy();
      return redirect()->to(base_url("/Auth/login"));

    }
    private function prc_login()
    {
      $logins = new logins();
      $input_login = array(
        'uname' => htmlspecialchars($this->request->getPost('username')),
      );
      $input_pass = htmlspecialchars($this->request->getPost('password'));
      $login_data = $logins->where($input_login)->findall();

      if(count($login_data)==1){
        if (password_verify($input_pass,$login_data[0]['upass'])) {
          $this->set_session($login_data[0]['user_id']);
          
          // $user_data = new session_storage();
          // pp($user_data->get('user_data'));
          return redirect()->to(base_url("/dashboard"));
        }else{
          $data['alert'] = 'Login gagal. Mohon periksa akun anda dengan benar.';
          return view('login',$data);
        }
      }else {
        $data['alert'] = 'Login gagal. Mohon periksa akun anda dengan benar.';
        return view('login',$data);
      }
    }

    private function set_session($user_id)
    {
      // $user_data = new session_storage();
      $users = new Users();
      $data = $users->where('user_id',$user_id)->first();
      $this->user_data->set('user_data',$data);
      $groups = $users->member_in($user_id);
      $this->user_data->push('user_data',['groups' =>$groups]);
      $this->user_data->set('login',true);
      $access_menus = $users->allowed_menus($user_id);
      $this->user_data->push('user_data',['acess_menu' =>$access_menus]);
    }
}
