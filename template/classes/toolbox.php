<?php

class DDDToolBox
{
  function getCurrentURL () {
    // $test = 120;
    $url = '//'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    return $url;
  }
}

?>
