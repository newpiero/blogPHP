<?php

include_once("model/db.php");
include_once("model/func_articles.php");

$db = new PDO('mysql:host=localhost;dbname=blog_db;charset=utf8', 'root', '', [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
$sql = "SELECT * FROM articles ORDER BY date_creation_article DESC";
$query = $db->prepare($sql);
$query->execute();
$errInfo = $query->errorInfo();

if ($errInfo[0] !== PDO::ERR_NONE) {
  echo $errInfo[2];
  exit();
}

$articles = $query->fetchAll();



?>


<div class="articles">

    <? foreach ($articles as $article): ?>
        <div class="article">
            <h2><?=$article['title']?></h2>
            <a href="article.php?id=<?=$article['id_article']?>">Read more</a>
        </div>
    <? endforeach;?>
</div>



<a href="add.php">Add article</a>


<hr>
<div class="articles">

		<div class="article">
			<h2></h2>
			<a href="article.php?id=<?=$id?>">Read more</a>
		</div>

</div>

<div>
    <a href="">Просмотреть логи визитов</a>

</div>

