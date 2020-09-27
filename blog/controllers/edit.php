<?php

include_once("model/func_articles.php");
include_once("core/arr.php");


$categories = categoriesAll();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $strId = $_GET['id'];
  $id = (int) $strId;
  $isSend = FALSE;
  $categories = categoriesAll();
  if (checkArticleId($id)) {
    $fields = articleOne($id);
    $title = $fields['title'];
    $content = $fields['content'];
    $id_category = $fields['id_category'];
  } else {
    $errNoArticle = "Статья не может быть отредактирована, так как её не существует";
  }
}
else {
  $title = '';
  $content = '';
  $id_category = '';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $strId = $_GET['id'];
  $id = (int) $strId;




  $fields = extractFields($_POST, ['title', 'content', 'id_category']);
  $fields['id'] = $id;
  $title = $fields['title'];
  $content = $fields['content'];
  $id_category = $fields['id_category'];

  $validateErrors = articleValidate($fields);

  if (empty($validateErrors)) {
    articleUpdate($fields);
    $lastInsertIdArticle = articleLastId();
    header("Location: ?c=article&?id=$id");
    exit();
  }
}

else {
    $fields = [
      'title' => '',
      'content' => '',
      'id_category' => '',
    ];
    $validateErrors = [];
}


include('views/tpl_edit.php');
