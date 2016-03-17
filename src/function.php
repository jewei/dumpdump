<?php

use Jewei\DumpDump\Dump;

if (!function_exists('dumpdump')) {
    /**
     * Var dump like a boss with functional programming.
     */
    function dumpdump($var)
    {
        foreach (func_get_args() as $var) {
            Dump::dump($var);
        }
    }
}
