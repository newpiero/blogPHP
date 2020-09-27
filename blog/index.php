<?php

$cname = $_GET['c'] ?? 'front';
$path = "controllers/$cname.php";

include_once($path);
