<?php

include_once("model/func_articles.php");
include_once('model/func_visits.php');


$filesLog = getLogsFiles();

$pageTitle = 'Выберите файл логов';
$pageContent = template('tpl_logs', [
    'filesLog' => $filesLog
]);
//include('views/tpl_logs.php');






