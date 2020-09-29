<?php

include_once('core/check.php');

$cname = $_GET['c'] ?? 'front';
$path = "controllers/$cname.php";

if (file_exists($path) && checkNameController($cname) ) {
    include_once($path);
}
else {
  header('HTTP/1.1 404 Not Found');
  include('errors/tpl_404.php');
  exit();
}


