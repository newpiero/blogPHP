<?php
include_once("model/db.php");
include_once("model/func_articles.php");



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $id = $_GET['id'];


  $db = new PDO('mysql:host=localhost;dbname=blog_db;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  $sql = "SELECT * FROM articles WHERE id_article = :id_article";
  $query = $db->prepare($sql);

  $query->bindParam(':id_article', $id);
  $query->execute();
  $errInfo = $query->errorInfo();

  if ($errInfo[0] !== PDO::ERR_NONE) {
    echo $errInfo[2];
    exit();
  }

  $articles = $query->fetchAll();
}

?>


<div class="content">

  <? foreach ($articles as $article):?>
	<? if($article['id_article'] !== NULL): ?>
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

  <? endforeach;?>
</div>
<hr>
<a href="index.php">Move to main page</a>