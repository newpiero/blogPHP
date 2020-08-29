<?php

include_once('functions.php');


$filesLog = getLogsFiles();

?>


<div class="logs_in">
  <? foreach ($filesLog as $arr): ?>

      <div class="files_logs">
          <a href="log.php?log=<?=$arr; ?>"><?=$arr; ?></a>
      </div>

  <? endforeach; ?>
</div>



