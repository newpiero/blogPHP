<?php

include_once("model/func_articles.php");

$articles = articlesAll();

//include('views/tpl_front.php');


$pageContent = template('tpl_front', [
    'articles' => $articles

]);


$pageTitle = 'Главная страница';
