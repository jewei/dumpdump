<?php

use Jewei\DumpDump\Dump;

if (!function_exists('dumpdump')) {
    /**
     * Var dump like a boss with functional programming.
     */
    function dumpdump($var, $id = null)
    {
        Dump::setBacktrace(debug_backtrace());
        Dump::dump($var, $id);
    }
}
