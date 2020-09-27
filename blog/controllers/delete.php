<?php


include_once("model/func_articles.php");

$errNoArticle = "";
$removeArticleTrue = "";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $strId = $_GET['id'];

  $id = (int) $strId;

  if (checkArticleId($id)) {
    articleDelete($id);
    $removeArticleTrue = "Статья успешно удалена";
  } else {
    $errNoArticle = "Статья не может быть удалена, так как её не существует";
  }
}

?>

<?=$errNoArticle?>
<?=$removeArticleTrue?>


<hr>
<a href="/">Move to main page</a>
