#!/usr/bin/env php
<?php
include 'usblight.php';
if (!file_exists("usblight.ini")) {die("usblight.ini missing");}
$ini = parse_ini_file("usblight.ini");

$color = isset($argv[1]) ? $argv[1] : 0;

$usblight = new usblight($ini['server_url']);
$usblight->setColor($color);

$current_color = $usblight->getColor();
echo 'Current color: ' . $current_color . "\n";
