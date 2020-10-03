<?php

include_once("model/func_articles.php");
include_once("model/func_categories.php");
include_once("model/func_visits.php");




if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $id = $_GET['id'] ?? '';

  if (checkArticleId($id) && checkId($id)) {
       $id = (int) $id;
       $article = articleOne($id);

    include('views/tpl_article.php');
    } else {
      header('HTTP/1.1 404 Not Found');
      include('errors/tpl_404.php');
      exit();
    }


}
else {
  $article = [
    'title' => '',
    'content' => '',
  'id_category' => 0
  ];


}




