<?php

include_once("model/func_articles.php");
include_once('model/func_visits.php');


$log = (string)($_GET['log'] ?? '');

$f = fopen("logs/$log", 'r');


$arr = "";
$style = "";
$pattern = "/\s|and|php.*php/iu";

include('views/tpl_log.php');

