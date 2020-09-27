<?php
//declare(strict_types=1);

include_once('model/func_articles.php');
include_once('core/arr.php');

$categories = categoriesAll();

$fields = [
  'title' => '',
  'content' => '',
  'id_category' => NULL
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



  $fields = extractFields($_POST, ['title', 'content', 'id_category']);

  $validateErrors = articleValidate($fields);

  if (empty($validateErrors)) {
    articlesAdd($fields);
    $lastInsertIdArticle = articleLastId();
    header("Location: ?c=article.php?id=$lastInsertIdArticle");
    exit();

  }
}
  else {
    $fields = [
      'title' => '',
      'content' => '',
      'id_category' => 0,
    ];

    $validateErrors = [];
  }




include('views/tpl_add.php');



