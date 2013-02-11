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
    exec(dirname(__FILE__) . '/light-' . $ini['os'] . ' ' . $color);
    echo 'Changed color: ' . $color . "\n";
  }
  sleep(5);
}
