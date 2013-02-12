#!/usr/bin/env php
<?php
include dirname(__FILE__) . '/usblight.php';
if (!file_exists(dirname(__FILE__) . '/usblight.ini')) {die('usblight.ini missing');}
$ini = parse_ini_file(dirname(__FILE__) . '/usblight.ini');

$color = isset($argv[1]) ? $argv[1] : 0;

$seconds = isset($argv[2]) ? $argv[2] : false;

$sleep = isset($argv[3]) ? true : false;

if ($sleep && $seconds) {
  sleep($seconds);
}

$usblight = new usblight($ini['server_url']);
$usblight->setColor($color);

if (!$sleep && $seconds) {
  exec("nohup php " . __FILE__ . " 0 " . $seconds. " 1 >/dev/null 2>&1  & echo $! &");
}