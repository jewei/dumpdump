<?php

namespace Jewei\DumpDump;

class Dump
{
    const FILE_USER = __DIR__ . '/config/config.json';
    const FILE_DIST = __DIR__ . '/config/config.json.dist';

    private static $config;

    /**
     * Var dump to file.
     *
     * @param $var The variable to var_dump.
     * @param $id  Identifier.
     */
    public static function dump($var, $id = null)
    {
        $config = self::getConfig();

        $backtrace = debug_backtrace();
        ob_start();
        print "\n";
        print $id ? sprintf("[%s]\n", (string) $id) : '';
        print self::printTime();
        print sprintf('%s %s:%s', $backtrace[0]['file'], $backtrace[0]['function'], $backtrace[0]['line']) . "\n";
        print str_repeat('-', 80) . "\n";
        var_dump($var);
        print str_repeat('-', 80) . "\n";
        file_put_contents($config['file_name'], strip_tags(html_entity_decode(ob_get_clean())), FILE_APPEND);
    }

    public static function getConfig()
    {
        if (!self::$config) {
            $file_dist = json_decode(file_get_contents(self::FILE_DIST));
            $file_user = file_exists(self::FILE_USER) ? json_decode(file_get_contents(self::FILE_USER)) : array();
            self::$config = array_merge((array) $file_dist, (array) $file_user);
        }
        return self::$config;
    }

    private static function printTime()
    {
        $config = self::getConfig();
        $time = '';
        if ($config['display_time']) {
            $datetime = new \DateTime();
            $time = $datetime->format($config['time_format']) . "\n";
        }
        return $time;
    }
}
