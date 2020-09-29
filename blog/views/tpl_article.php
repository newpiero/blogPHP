<div class="content">
  <? if($id !== NULL): ?>
    <div class="article">
      <h1><?=$article['title']?></h1>
      <div><?=$article['content']?></div>
      <div><?=$article['id_category']?></div>
      <hr>
      <a href="?c=delete&id=<?=$article['id_article']?>">Remove</a>
      <br>
      <a href="?c=edit&id=<?=$article['id_article']?>">Edit</a>
    </div>
  <? else: ?>
    <div class="e404">
      <h1>Страница не найдена!</h1>
    </div>
  <? endif; ?>


</div>
<hr>
<a href="?c=front">Move to main page</a>
