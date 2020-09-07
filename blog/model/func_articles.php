<?php

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

