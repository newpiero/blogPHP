<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $id = $_GET['id'];


  $db = new PDO('mysql:host=localhost;dbname=blog_db;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  $sql = "SELECT * FROM articles WHERE id_article = :id_article";
  $query = $db->prepare($sql);

  $query->bindParam(':id_article', $id);
  $query->execute();
  $errInfo = $query->errorInfo();

  if ($errInfo[0] !== PDO::ERR_NONE) {
    echo $errInfo[2];
    exit();
  }

  $articles = $query->fetchAll();
}

?>