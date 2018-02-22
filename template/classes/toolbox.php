<?php

class DDDToolBox
{
  function getCurrentURL () {
    $url = '//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    return $url;
  }
  function getUploadDir () {
    $dir = '//'.$_SERVER['HTTP_HOST'].'/wp-content/uploads/';
    return $dir;
  }
}

?>
