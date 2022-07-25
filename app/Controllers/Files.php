<?php

namespace App\Controllers;

class Files extends BaseController
{
    public function show()
    {
      $path='';
      $w = $this->request->uri->getSegments();
      for ($i=0; $i < ( count($w) - 1); $i++) { 
        $path .= $w[$i].'/';
      }
      $path .= $w[count($w)-1];
      
      $attachment_location = WRITEPATH .$path;
      if (file_exists($attachment_location)) {
          header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
          header("Cache-Control: public"); // needed for internet explorer
          header("Content-Type: html");
          header("Content-Transfer-Encoding: Binary");
          header("Content-Length:".filesize($attachment_location));
          // header("Content-Disposition: attachment; filename=file.zip");
          readfile($attachment_location);
          die();        
      } else {
          die("Error: File not found.");
      } 
    }
}
