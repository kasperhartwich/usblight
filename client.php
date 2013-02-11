#!/usr/bin/env php
<?php
include dirname(__FILE__) . '/usblight.php';
if (!file_exists(dirname(__FILE__) . '/usblight.ini')) {die('usblight.ini missing');}
$ini = parse_ini_file(dirname(__FILE__) . '/usblight.ini');

$color = isset($argv[1]) ? $argv[1] : 0;

$usblight = new usblight($ini['server_url']);
$usblight->setColor($color);
