<?php


function getLogs() : string {

  $arr = getLogsFiles();

  $str = file_get_contents("logs/$arr");

  return $str;

}

function getLogsFiles(): array {
  $files = scandir('logs');

  $filesLog = array_filter($files, function ($f) {
    return is_file("logs/$f") && preg_match('/.*\.log$/', $f);
  });

  return $filesLog;

}

//функция вывода информации, возвращает массив строк.

function getInfoPageAndUser() {

  $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $urlReferal = $_SERVER['HTTP_REFERER'] ?? "";
  $date = date("H:i:s");

// IP-адрес пользователя
  $client  = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote  = @$_SERVER['REMOTE_ADDR'];

  if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
  elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
  else $ip = $remote;


  $infoPageAndUser = $date.';'.$ip.';'.$url.';'.$urlReferal;
  return $infoPageAndUser;
}


// Функция записи данной информации в файл. Каждая запись с новой строчки

function saveLogFile() : bool {
  $app = getInfoPageAndUser()."\n";
  $fdate = "logs\\".date("d_m_Y").'.log';
  $f = fopen($fdate, 'a+');
  fwrite($f, $app);
  fclose($f);
  return TRUE;
}


function clean($value = "") {
  $value = trim($value);
  $value = stripcslashes($value);
  $value = strip_tags($value);
  $value = htmlspecialchars($value);
  return $value;
}


// Check length string input

function checkLength(string $value = "", int $minLength = 10, int $maxLength = 100): bool {
  $result = (mb_strlen($value, 'UTF8') < $minLength || mb_strlen($value) > $maxLength);
  return !$result;

}

function getArticles(): array {
  return json_decode(file_get_contents('db/articles.json'), TRUE);
}

function checkId($id): bool {

  $arr = getArticles();

  if (array_key_exists($id, $arr)) {
    return TRUE;
  }
  else {
    return FALSE;
  }

}

function addArticle(string $title, string $content): bool {
  $articles = getArticles();

  $lastId = end($articles)['id'];
  $id = $lastId + 1;

  $articles[$id] = [
    'id' => $id,
    'title' => $title,
    'content' => $content,
  ];

  saveArticles($articles);
  return TRUE;
}

function removeArticle(int $id): bool {
  $articles = getArticles();

  if (isset($articles[$id])) {
    unset($articles[$id]);
    saveArticles($articles);
    return TRUE;
  }

  return FALSE;
}

function saveArticles(array $articles): bool {
  file_put_contents('db/articles.json', json_encode($articles));
  return TRUE;
}


function editArticle(int $id, string $title, string $content): bool {
  $articles = getArticles();

  $articles[$id] = [
    'id' => $id,
    'title' => $title,
    'content' => $content,
  ];

  saveArticles($articles);
  return TRUE;


}