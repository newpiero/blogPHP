<?php

	include_once('functions.php');

$errNoArticle = "";
$removeArticleTrue = "";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $id = $_GET['id'];

  if (checkId($id)) {
    removeArticle($id);
    $removeArticleTrue = "Статья успешно удалена";
  } else {
    $errNoArticle = "Статья не может быть удалена, так как её не существует";
  }


}

?>
<?=$errNoArticle?>
<?=$removeArticleTrue?>

<hr>
<a href="index.php">Move to main page</a>