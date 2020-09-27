<?php

include_once("model/func_articles.php");

$articles = articlesAll();

include('views/tpl_front.php');

