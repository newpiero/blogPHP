<?php

include_once("model/func_articles.php");
include_once('model/func_visits.php');


$log = (string)($_GET['log'] ?? '');

$f = fopen("logs/$log", 'r');


$arr = "";
$style = "";
$pattern = "/\s|and|php.*php/iu";

$pageTitle = "Логи файла $log";
$pageContent = template('tpl_log', [
    'log' => $log,
    'arr' => $arr,
    'f' => $f,
    'style' => $style,
    'pattern' => $pattern
]);
//include('views/tpl_log.php');

