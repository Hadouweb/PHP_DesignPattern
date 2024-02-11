<?php

namespace Singleton;

$s1 = SingletonParent::getInstance();
$s2 = SingletonParent::getInstance();

var_dump(spl_object_id($s1));
var_dump(spl_object_id($s2));


$sc1 = SingletonChild::getInstance();
$sc2 = SingletonChild::getInstance();

var_dump(spl_object_id($sc1));
var_dump(spl_object_id($sc2));

class SingletonParent
{
    private static $instances = [];
    
    private function __construct() { }

    private function __clone() { }

    public static function getInstance(): SingletonParent
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls]))
        {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }


    public function test()
    {
        return self::$instances;
    }
}

class SingletonChild extends SingletonParent
{

}