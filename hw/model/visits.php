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


