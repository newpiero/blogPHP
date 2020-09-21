<?php
declare(strict_types=1);
include_once("model/func_articles.php");



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $strId = $_GET['id'] ?? '';

  $id = (int) $strId;


  $article = articleOne($id);

}

//$idd = checkArticleId($id);

?>

<?//=$idd?>


<div class="content">


	<? if($id !== NULL): ?>
		<div class="article">
			<h1><?=$article['title']?></h1>
			<div><?=$article['content']?></div>
			<hr>
			<a href="delete.php?id=<?=$article['id_article']?>">Remove</a>
            <br>
			<a href="edit.php?id=<?=$article['id_article']?>">Edit</a>
		</div>
	<? else: ?>
		<div class="e404">
			<h1>Страница не найдена!</h1>
		</div>
	<? endif; ?>


</div>
<hr>
<a href="index.php">Move to main page</a>