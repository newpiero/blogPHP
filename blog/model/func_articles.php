<?php
declare(strict_types=1);

include_once("db.php");




function articlesAll() : array {
  $sql = "SELECT * FROM articles ORDER BY date_creation_article DESC";
  $query = dbQuery($sql);
  return $query->fetchAll();
}

function articleOne(int $id) : ?array {
  $sql = "SELECT * FROM articles WHERE id_article = :id_article";
  $query = dbQuery($sql, ['id_article' => $id]);
  $article = $query->fetch();
  return is_array($article) ? $article : NULL;
}

function articlesAdd(array $fields) : bool {
  $sql = "INSERT INTO articles (title, content) VALUES (:title, :content)";
  dbQuery($sql, $fields);
  return TRUE;
}

function articleDelete($id) : bool {
  $sql = "DELETE FROM articles WHERE id_article = :id_article";
  dbQuery($sql, ['id_article' => $id]);
  return TRUE;
}

function articleUpdate(array $fields) : bool{
  $sql = "UPDATE articles SET title = :title, content = :content WHERE id_article = :id";
  dbQuery($sql, $fields);
  return TRUE;
}

function articleLastId() {
  $db = dbConnect();
  $lastId = $db->lastInsertId();
  return $lastId;

}

function checkArticleId($id) : bool  {
  $sql = "SELECT * FROM articles WHERE id_article = :id_article";
  $query = dbQuery($sql, ['id_article' => $id]);
  $article = $query->fetch();
  if ($article['id_article'] !== NULL) {
    return TRUE;
  } else FALSE;
}

function clean($value = "") {
  $value = trim($value);
  $value = stripcslashes($value);
  $value = strip_tags($value);
  $value = htmlspecialchars($value);
  return $value;
}

function checkLength(string $value = "", int $minLength = 1, int $maxLength = 1000): bool {
  $result = (mb_strlen($value, 'UTF8') < $minLength || mb_strlen($value) > $maxLength);
  return !$result;

}




