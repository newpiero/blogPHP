<?php
include_once('functions.php');

$log = (string)($_GET['log'] ?? '');

$f = fopen("logs/$log", 'r');

?>



<h2>Анализируем логи файла - <?=$log ?></h2>
<table border="1">
  <thead>
  <tr>
    <th>Время посещения</th>
    <th>IP - посетителя</th>
    <th>URL - посещения</th>
    <th>С какого URL пришёл</th>
  </tr>
  </thead>

  <tbody>
  <?
  $arr = "";
  $style = "";
  $pattern = "/\s|and|php.*php/iu";

  while (!feof($f)) {
    $str = rtrim(fgets($f));
    if ($str !== "") {
      $arr = explode(';', $str);
    }

    if ((preg_match($pattern, $arr[2])) == TRUE) {
      $style1 = "color:red";
    }
    if ((preg_match($pattern, $arr[3])) == TRUE) {
      $style2 = "color:red";
    }
    ?>
    <tr>
      <td><?=$arr[0] ?></td>
      <td><?=$arr[1] ?></td>
      <td style="<?=$style1?>"><?=$arr[2] ?></td>
      <td style="<?=$style2?>"><?=$arr[3] ?></td>
    </tr>
    <?
    $style1 = "";
    $style2 = "";
  }
  fclose($f)
  ?>
  </tbody>

  <tfoot>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </tfoot>
</table>