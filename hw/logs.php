<?php

include_once('functions.php');


//
//if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//
//  $dateLogs = $_GET['dateLogs'];
//
//
//
//
//
//}
//$dateLogs = (string)($_GET['dateLogs'] ?? '');
//$post = $articles[$id] ?? null;
//$hasPost = ($post !== null);




$filesLog = getLogsFiles();


/*
foreach ($files as $f) {
  if (is_file("logs/$f") && preg_match('/.*\.log$/', $f)) {
    $filesLog[] = $f;
  }
}
*/

echo '<pre>';
print_r($files);
echo '</pre>';
echo '<pre>';
print_r($filesLog);
echo '</pre>';

?>

<div class="table logs">
    <? foreach ($filesLog as $arr): ?>

    <div class="files_logs">
        <a href="logs/"><?=$arr; ?></a>
    </div>

    <? endforeach; ?>
</div>

<div class="logs_in">
  <? foreach ($filesLog as $arr): ?>

      <div class="files_logs">
          <a href="logs/logs.php?dateLogs="><?=$arr; ?></a>
      </div>

  <? endforeach; ?>
</div>

<table>
    <thead>
    <tr>
        <th>№ п/п</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="5" style="text-align:right">ИТОГО:</td><td>1168,80</td>
    </tr>
    </tfoot>
    <tbody>
    <tr>
        <td>1.</td>
        <td>Томаты свежие</td><td>кг</td><td>15,20</td><td>69,00</td><td>1048,80</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Огурцы свежие</td><td>кг</td><td>2,50</td><td>48,00</td><td>120,00</td>
    </tr>
    </tbody>
</table>


