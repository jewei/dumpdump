<?php

/**
 * Var dump to file.
 *
 * @param $var The variable to var_dump.
 * @param $id  Identifier.
 */
function dumpdump($var, $id = null)
{
    $datetime = new DateTime();
    $backtrace = debug_backtrace();
    ob_start();
    print "\r";
    print $id ? sprintf("[%s]\r", (string) $id) : '';
    print $datetime->format('r') . "\r";
    print sprintf('%s %s:%s', $backtrace[0]['file'], $backtrace[0]['function'], $backtrace[0]['line']) . "\r";
    print str_repeat('-', 80) . "\r";
    var_dump($var);
    print str_repeat('-', 80) . "\r";
    file_put_contents('debug.txt', strip_tags(html_entity_decode(ob_get_clean())), FILE_APPEND);
}
