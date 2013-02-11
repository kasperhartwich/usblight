#!/usr/bin/env php
<?php
set_time_limit(0);
include 'usblight.php';
if (!file_exists("usblight.ini")) {die("usblight.ini missing");}
$ini = parse_ini_file("usblight.ini");

$usblight = new usblight($ini['server_url']);
$current_color = 0;

while (true) {
  $color = $usblight->getColor();
  if ($current_color != $color) {
    $current_color = $color;
    exec('./light-' . $ini['os'] . ' ' . $color);
    echo 'Changed color: ' . $color . "\n";
  }
  sleep(5);
}
