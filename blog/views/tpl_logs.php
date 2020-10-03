<div class="logs_in">
    <? foreach ($filesLog as $arr): ?>

        <div class="files_logs">
            <a href="?c=log&log=<?=$arr; ?>"><?=$arr; ?></a>
        </div>

    <? endforeach; ?>
</div>