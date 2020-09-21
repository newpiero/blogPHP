<?php


function dbConnect() : PDO {
  static $db;

  if ($db === NULL) {
    $db = new PDO('mysql:host=localhost;dbname=blog_db;charset=utf8', 'root', '', [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }
  return $db;
}

function dbQuery(string $sql, array $param = []) : PDOStatement {
  $db = dbConnect();
  $query = $db->prepare($sql);
  $query->execute($param);
  dbCheckError($query);
  return $query;
}

function dbCheckError(PDOStatement $query) : bool {
  $errInfo = $query->errorInfo();
  if ($errInfo[0] !== PDO::ERR_NONE) {
    echo $errInfo[2];
    exit();
  }

  return TRUE;
}





