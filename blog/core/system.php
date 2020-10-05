<?php

function template(string $pathTemplate, array $vars = []) : string {
    $systemFullPathTemplate = "views/$pathTemplate.php";
    extract($vars);
    ob_start();
    include($systemFullPathTemplate);
    return ob_get_clean();
}
