<?php
$set = isset($_GET['set']) ? (integer)$_GET['set'] : false;
$get = isset($_GET['get']) ? $_GET['get'] : false;
$id = isset($_GET['id']) ? $_GET['id'] : 'default';
$allowed = array(0,1,2,3,4,5,6,7);

if ($set!==false && in_array($set, $allowed)) {
  echo file_put_contents('./lights/' . $id, $set);
}

if ($get) {
  echo file_get_contents('./lights/' . $id);
}