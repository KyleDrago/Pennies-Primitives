<?php

class DDDToolBox
{
  public function getCurrentURL () {
    $url = '//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    return $url;
  }
  public function getUploadDir () {
    $dir = '//'.$_SERVER['HTTP_HOST'].'/wp-content/uploads/';
    return $dir;
  }
}

?>
