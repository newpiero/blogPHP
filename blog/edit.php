<?php

include_once("model/func_articles.php");
  $errEmpty = "";
  $errLength = "";
  $isSend = FALSE;




if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $strId = $_GET['id'];
  $id = (int) $strId;

  $isSend = FALSE;

  $title = "";
  $content = "";

  if (checkArticleId($id)) {
    $arr2 = articleOne($id);
    print_r($arr2);
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
  $title = clean($_POST['title']);
  $content = clean($_POST['content']);

  if (!empty($title) && !empty($content)) {
    if (checkLength($title, 10, 100) && checkLength($content, 35, 350)) {
      editArticle($id, $title, $content);
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
