<?php

include_once('core/check.php');
include_once('core/system.php');

$cname = $_GET['c'] ?? 'front';
$path = "controllers/$cname.php";

$pageTitle = 'Ошибка 404';
$pageContent = '';

if (file_exists($path) && checkNameController($cname) ) {
    include_once($path);
}
else {
    $content = template("base/tpl_404");
}


$html = template('base/tpl_main', [
    'pageTitle' => $pageTitle,
    'pageContent' => $pageContent
]);

echo $html;

