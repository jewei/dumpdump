<?php

namespace Jewei\DumpDump;

class Dump
{
    /**
     * Var dump to file.
     *
     * @param $var The variable to var_dump.
     * @param $id  Identifier.
     */
    public static function dump($var, $id = null)
    {
        $datetime = new \DateTime();
        $backtrace = debug_backtrace();
        ob_start();
        print "\n";
        print $id ? sprintf("[%s]\n", (string) $id) : '';
        print $datetime->format('r') . "\n";
        print sprintf('%s %s:%s', $backtrace[0]['file'], $backtrace[0]['function'], $backtrace[0]['line']) . "\n";
        print str_repeat('-', 80) . "\n";
        var_dump($var);
        print str_repeat('-', 80) . "\n";
        file_put_contents('debug.txt', strip_tags(html_entity_decode(ob_get_clean())), FILE_APPEND);
    }
}
