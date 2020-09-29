<?php
//declare(strict_types=1);

include_once('core/db.php');
include_once('core/arr.php');


function articlesAll() : array {
  $sql = "SELECT * FROM articles ORDER BY date_creation_article DESC";
  $query = dbQuery($sql);
  return $query->fetchAll();
}

function articleOne($id) : ?array {
  $sql = "SELECT * FROM articles WHERE id_article = :id_article";
  $query = dbQuery($sql, ['id_article' => $id]);
  $article = $query->fetch();
  return is_array($article) ? $article : NULL;
}

function articlesAdd(array $fields) : bool {
  $sql = "INSERT INTO articles (title, content, id_category) VALUES (:title, :content, :id_category)";
  dbQuery($sql, $fields);
  return TRUE;
}

function articleDelete($id) : bool {
  $sql = "DELETE FROM articles WHERE id_article = :id_article";
  dbQuery($sql, ['id_article' => $id]);
  return TRUE;
}

function articleUpdate(array $fields) : bool{
  $sql = "UPDATE articles SET title = :title, content = :content, id_category = :id_category WHERE id_article = :id";
  dbQuery($sql, $fields);
  return TRUE;
}

function articleLastId() {
  $db = dbConnect();
  $lastId = $db->lastInsertId();
  return $lastId;
}

function checkArticleId($id) : bool {
  $sql = "SELECT * FROM articles WHERE id_article = :id_article";
  $query = dbQuery($sql, ['id_article' => $id]);

  if ($query->fetchColumn() > 0) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}


function articleValidate($fields) : array {
  $errors = [];
  $textLen = mb_strlen($fields['content'], 'UTF-8');

  if (mb_strlen($fields['title'], 'UTF-8') < 2) {
    $errors[] = 'Длина заголовка должна быть больше 2 символов';
  }
  if ($textLen < 2 || $textLen > 120) {
    $errors[] = "Длина статья должна быть больше 2 и менее 1400 символов";
  }
  return $errors;
}

function checkLength(string $value = "", int $minLength = 1, int $maxLength = 1000): bool {
  $result = (mb_strlen($value, 'UTF8') < $minLength || mb_strlen($value) > $maxLength);
  return !$result;

}

function checkID($id) {
  $pattern = '/^[1-9]+\d*/';
  preg_match($pattern, $id, $array);
  $res = $array;
  if ($id == $res[0]) {
    return TRUE;
  } else return FALSE;
}






