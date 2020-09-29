<?php

include_once('core/db.php');
include_once('core/arr.php');


function categoriesAll() : array {
  $sql = "SELECT * FROM categories";
  $query = dbQuery($sql);
  return $query->fetchAll();
}
