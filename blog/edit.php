<?php

include_once("model/func_articles.php");
  $errEmpty = "";
  $errLength = "";
  $isSend = FALSE;

$fields = [];



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $strId = $_GET['id'];
  $id = (int) $strId;

  $isSend = FALSE;

  $title = "";
  $content = "";

  if (checkArticleId($id)) {
    $arr2 = articleOne($id);
    $title = $arr2['title'];
    $content = $arr2['content'];

  } else {
    $errNoArticle = "Статья не может быть отредактирована, так как её не существует";
  }

}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $strId = $_GET['id'];
  $id = (int) $strId;

  $isSend = TRUE;


  $fields['title'] = clean($_POST['title']);
  $fields['content'] = clean($_POST['content']);
  $fields['id'] = $id;

  if (!empty($fields['title']) && !empty($fields['content'])) {
    if (checkLength($fields['title'], 10, 100) && checkLength($fields['content'], 35, 350)) {
      articleUpdate($fields);
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

}





?>


  <div class="form">
    <? if($isSend): ?>

      <div>Вы успешно изменили статью!</div>

    <? else: ?>

      <h3>Вы редактируете статью "<?=$title?>"</h3>
      <form method="post" class="editArcticle">
        <br>
        <p>Заголовок статьи</p>
        <input type="text" name="title" placeholder="Введите заголовок" value="<?=$title?>">

        <br>
        <p>Текст статьи</p>
        <input type="text" name="content" placeholder="Введите содержание статьи" value="<?=$content?>">
        <br>
        <br><br>
        <button type="submit">save article</button>
        <div class="error">
          <?=$errEmpty?>
          <?=$errLength?>
        </div>
      </form>


    <? endif; ?>


  </div>


  <hr>
  <a href="index.php">Move to main page</a>
