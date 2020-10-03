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

  return (array)$filesLog;

}

function saveLogFile() : bool {
    $app = getInfoPageAndUser()."\n";
    $f_date = "logs\\".date("d_m_Y").'.log';
    $f = fopen($f_date, 'a+');
    fwrite($f, $app);
    fclose($f);
    return TRUE;
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



