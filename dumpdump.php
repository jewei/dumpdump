<?php

/**
 * Var dump to file.
 */
function dumpdump($var, $name = NULL) {
    ob_start();
    echo $name ? sprintf("[%s]\r", (string) $name) : '';
    echo str_repeat('-', 80) . "\r";
    var_dump($var);
    echo str_repeat('-', 80) . "\r\r\r";
    file_put_contents('dump.txt', strip_tags(html_entity_decode(ob_get_clean())), FILE_APPEND);
}
