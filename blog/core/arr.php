<?php

/*
 * $target - ассоциативный одномерный массив
 * $fields - простой массив со списком строк
 *
 * &t = [a => 1, b =>2 ... c => 10, d => 20]
 * $f = [a,c]
 */

function extractFields(array $target, array $fields) : array {

  $res = [];

  foreach ($fields as $field) {
    $res[$field] = strip_tags(stripcslashes(trim($target[$field])));
    $res[$field] = htmlspecialchars($res[$field]);
  }
  return $res;
}




