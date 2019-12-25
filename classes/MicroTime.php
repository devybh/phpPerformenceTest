<?php


class MicroTime
{
    private static array $storage = [];

    public static function check($name)
    {
        $now = microtime(true);
        $key = isset(self::$storage[$name]) ? 'end' : 'start';
        self::$storage[$name][$key] = $now;
    }

    public static function getDiffs()
    {
        $diffs = [];
        foreach (self::$storage as $name => $each) {
            $diffs[$name] = round($each['end'] - $each['start'], 3);
            // $diffs[$name] = $each['end'] - $each['start'];
        }
        return $diffs;
    }
}