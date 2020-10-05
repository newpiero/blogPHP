<div class="articles">

  <? foreach ($articles as $article): ?>
    <div class="article">
      <h2><?=$article['title']?></h2>
      <a href="?c=article&id=<?=$article['id_article']?>">Read more</a>
    </div>
  <? endforeach;?>
</div>



<a href="?c=add">Add article</a>


<hr>

<div>
  <a href="?c=logs">Просмотреть логи визитов</a>
</div>