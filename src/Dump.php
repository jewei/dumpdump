<?php

namespace Jewei\DumpDump;

class Dump
{
    /**
     * User configuration.
     */
    const FILE_USER = __DIR__ . '/config/config.json';

    /**
     * Default configuration.
     */
    const FILE_DIST = __DIR__ . '/config/config.json.dist';

    /**
     * @var Active configuration.
     */
    private static $config;

    /**
     * @var backtrace() value.
     */
    private static $backtrace;

    /**
     * Var dump to file.
     *
     * @param $var The variable to var_dump.
     * @param $id  Identifier.
     *
     * @return void
     */
    public static function dump($var, $id = null)
    {
        $config = self::getConfig();

        $backtrace = self::getBacktrace(debug_backtrace());
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

    /**
     * Merge the user/default settings and return it.
     *
     * @param string  $path_dist
     * @param string  $path_user
     *
     * @return array
     */
    private static function getConfig($path_dist = self::FILE_DIST, $path_user = self::FILE_USER)
    {
        if (!self::$config) {
            $file_dist = json_decode(file_get_contents($path_dist));
            $file_user = file_exists($path_user) ? json_decode(file_get_contents($path_user)) : array();
            self::$config = array_merge((array) $file_dist, (array) $file_user);
        }
        return self::$config;
    }

    /**
     * @param array  $elements
     */
    private static function getBacktrace($elements)
    {
        return self::$backtrace ? self::$backtrace : $elements;
    }

    /**
     * @param array  $elements
     */
    public static function setBacktrace($elements)
    {
        self::$backtrace = $elements;
    }

    private static function printTime()
    {
        $config = self::getConfig();
        $time = '';
        if (!empty($config['display_time'])) {
            $datetime = new \DateTime();
            $time = $datetime->format($config['time_format']) . "\n";
        }
        return $time;
    }
}
