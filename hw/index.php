<?php

	include_once('model/articles.php');
    include_once('model/visits.php');
	$articles = getArticles();

?>
<a href="add.php">Add article</a>
<hr>
<div class="articles">
	<? foreach($articles as $id => $article): ?>
		<div class="article">
			<h2><?=$article['title']?></h2>
			<a href="article.php?id=<?=$id?>">Read more</a>
		</div>
	<? endforeach; ?>
</div>

<div>
    <a href="logs.php">Просмотреть логи визитов</a>

</div>


<? saveLogFile() ?>
	