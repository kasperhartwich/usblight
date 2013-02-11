<?php
class usblight {
  private $server;
  private $id;
  private $colors = array(
    'off' => 0,
    'blue' => 1,
    'red' => 2,
    'green' => 3,
    'light blue' => 4,
    'purple' => 5,
    'yellow-green' => 6,
    'white' => 7
  );
  
  function __construct($server, $id = 'default') {
    $this->server = $server;
    $this->id = $id;
  }
  
  function setColor($color) {
    if (array_key_exists($color, $this->colors)) {$color = $colors[$color];}

    return file_get_contents($this->server . '?set=' . $color . '&id=' . $this->id);
  } 
  
  function getColor() {
    return file_get_contents($this->server . '?get=true&id=' . $this->id);
  }
  
}