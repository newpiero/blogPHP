<?php


include_once("model/func_articles.php");



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $strId = $_GET['id'];

  $id = (int) $strId;

  if (checkArticleId($id)) {
    articleDelete($id);
    $pageTitle = "Статья успешно удалена";
  } else {
    $pageTitle = "Статья не может быть удалена, так как её не существует";
  }
}

?>



<hr>
<a href="?c=front">Move to main page</a>
