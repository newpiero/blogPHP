<?php


    include_once('functions.php');
    $errEmpty = "";
    $errLength = "";
    $isSend = FALSE;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $isSend = TRUE;
      $title = clean($_POST['title']);
      $content = clean($_POST['content']);



  if (!empty($title) && !empty($content)) {
    if (checkLength($title, 10, 100) && checkLength($content, 35, 350)) {
      addArticle($title, $content);
    }
    else {
      $isSend = FALSE;
      $errLength = "Длина заголовка больше 10 и меньше 100, длина статья от 35 до 350 символов";
    }
  }
  else {
    $errEmpty = "Заполните все поля";
    $isSend = FALSE;
  }




} else {

  $title = '';
  $content = '';
}


?>

<div class="form">
    <? if($isSend): ?>

        <div>Вы успешно добавили статью!</div>

    <? else: ?>
        <form method="post" class="addArcticle">
            <br>
            <br>
            <br>
            <input type="text" name="title" placeholder="Введите заголовок" value="<?=$title?>">
            <br>
            <br>
            <br>
            <input type="text" name="content" placeholder="Введите содержание статьи" value="<?=$content?>">
            <br>
            <br>
            <br>
            <button type="submit">send new article</button>
            <div class="error">
              <?=$errEmpty?>
              <?=$errLength?>
            </div>
        </form>


    <? endif; ?>


</div>


<hr>
<a href="index.php">Move to main page</a>