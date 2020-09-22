<?php
declare(strict_types=1);

include_once('model/func_articles.php');



$errEmpty = "";
$errLength = "";
$isSend = FALSE;

  $fields = [
    'title' => '',
    'content' => '',
  ];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $isSend = TRUE;
  $fields['title'] = clean($_POST['title']);
  $fields['content'] = clean($_POST['content']);



  if (!empty($fields['title']) && !empty($fields['content'])) {
    if (checkLength($fields['title'], 10, 1000) && checkLength($fields['content'], 10, 1000)) {
      articlesAdd($fields);
      $lastInsertIdArticle = articleLastId();
      header("Location: article.php?id=$lastInsertIdArticle");
      exit();

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


<div; class="form">



        <form method="post" class="addArcticle">
            <br>
            <br>
            <br>
            <input type="text" name="title" placeholder="Введите заголовок" value="<?=$fields['title']?>">
            <br>
            <br>
            <br>
          <textarea type="text" name="content" placeholder="Введите содержание статьи" value="<?=$fields['content']?>"></textarea>
            <br>
            <br>
            <br>
            <button type="submit">send new article</button>
            <div class="error">
              <?=$errEmpty?>
              <?=$errLength?>
            </div>
        </form>




