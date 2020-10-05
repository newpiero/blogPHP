<?php

include_once("model/func_articles.php");
include_once("model/func_categories.php");
include_once("model/func_visits.php");

    $id = $_GET['id'] ?? '';
    $article = articleOne($id);

  if (checkArticleId($id) && checkId($id)) {
        $id = (int) $id;
          $pageTitle = $article['title'];
          $pageContent = template('tpl_article', [
              'article' => $article
          ]);
    } else {
      $pageContent = template("base/tpl_404");
    }

