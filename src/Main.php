<?php

namespace Yveschiu\Experiments;

require dirname(__DIR__) . '/vendor/autoload.php';

use ReflectionClass;
use Yveschiu\Experiments\Entities\Profile;


/**
 * 
 * Simple experiments to understand php reflection
 * @see https://www.php.net/manual/en/book.reflection.php
 * 
 */
class Main
{
    public function __construct()
    {
        //
    }

    public static function resolveClassName(object $class): string
    {
        return (new ReflectionClass($class))->getName();
    }

    public static function resolveClassVariables(object $class): array
    {
        $vars = [];
        $reflect = new ReflectionClass($class);
        foreach ($reflect->getProperties() as $property) {
            $property->setAccessible(true);
            $vars[$property->getName()] = [
                'value' => $property->getValue($class),
                'type' => $property->getType()->getName()
            ];
        }
        return $vars;
    }

    public static function resolveClassMethods(object $class): array
    {
        $methods = [];
        $reflect = new ReflectionClass($class);
        foreach ($reflect->getMethods() as $method) {
            $params = [];
            foreach ($method->getParameters() as $param) {
                $params[] = [
                    'name' => $param->getName(),
                    'type' => $param->getType()->getName()
                ];
            }
            $methods[$method->getName()] = [
                'params' => $params
            ];
        }
        return $methods;
    }

    public static function main(): void
    {
        $profile = new Profile();
        echo 'Reflection class name:' . PHP_EOL;
        echo self::resolveClassName($profile) . PHP_EOL;
        echo str_repeat('-', 20) . PHP_EOL;

        echo 'Reflection class properties/variables:' . PHP_EOL;
        print_r(self::resolveClassVariables($profile));
        echo str_repeat('-', 20) . PHP_EOL;

        echo 'Reflection class methods and their params:' . PHP_EOL;
        print_r(self::resolveClassMethods($profile));
        echo str_repeat('-', 20) . PHP_EOL;
    }
}

Main::main();
