<?php

namespace App\Libraries;

class session_storage
{
  function set($key,$val)
  {
    if (is_string($val)) {
      $_SESSION[$key] = $val;
    }else {
      $_SESSION[$key] = json_encode($val);
    }
  }

  function get($key)
  {
    if (isset($_SESSION[$key])) {
      return json_decode($_SESSION[$key]);
    }else {
      throw new Exception("Key tidak ditemukan");
    }
  }

  function push($key,$val)
  {
    if (isset($_SESSION[$key])) {
      $data = json_decode($_SESSION[$key]);

      if (is_array($val)) {
        $data_push = $val;
      }elseif (is_object($val)) {
        $str_data = json_encode($val);
        $data_push = json_decode($val);
      }elseif (is_string($val)) {
        $data_push = json_decode($val);
      }else {
        return false;
      }
      $_SESSION[$key] = json_encode( (object) array_merge((array)$data, (array) $data_push) );
      // array_push($data,$data_push);
    }
  }
}