#!/usr/bin/env php
<?php
set_time_limit(0);
include dirname(__FILE__) . '/usblight.php';
if (!file_exists(dirname(__FILE__) . '/usblight.ini')) {die('usblight.ini missing');}
$ini = parse_ini_file(dirname(__FILE__) . '/usblight.ini');

$usblight = new usblight($ini['server_url']);
$current_color = 0;

while (true) {
  $color = $usblight->getColor();
  if ($current_color != $color) {
    $current_color = $color;
    if ($ini['os']=='osx') {
      exec(dirname(__FILE__) . '/light-osx ' . $color);
    } else if ($ini['os']=='raspberrypi') {
      $colors = array(0 => 'off', 1 => 'blue', 2 => 'red', 3 => 'green', 4 => 'lightblue', 5 => 'purple', 6 => 'lightgreen', 7 => 'white');
      exec(dirname(__FILE__) . '/light-raspberrypi ' . $colors[$color]);
    }
    echo 'Changed color: ' . $color . "\n";
  }
  sleep(5);
}
