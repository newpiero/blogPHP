<?php


include_once("model/func_articles.php");

$articles = articlesAll();



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

