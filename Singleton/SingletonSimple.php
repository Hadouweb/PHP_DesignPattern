<?php

namespace Singleton;

$s1 = SingletonSimple::getInstance();
$s2 = SingletonSimple::getInstance();

var_dump(spl_object_id($s1));
var_dump(spl_object_id($s2));


class SingletonSimple
{
    private static $instance = null;
    private function __construct() { }

    private function __clone() { }

    public static function getInstance(): SingletonSimple
    {
        if (!isset(self::$instance))
        {
            self::$instance = new SingletonSimple();
        }

        return self::$instance;
    }


    public function test()
    {
        return self::$instance;
    }
}