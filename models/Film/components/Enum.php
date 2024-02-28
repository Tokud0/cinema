<?php

namespace app\models\Film\components;

use ReflectionClass;
use ReflectionException;

abstract class Enum
{
    /**
     * @throws ReflectionException
     */
    public static function all(): array
    {
        $className = static::class;
        return (new ReflectionClass($className))->getConstants();
    }

    /**
     * @throws ReflectionException
     */
    public static function values(): array
    {
        $constants = static::all();
        $constants = array_values($constants);
        return array_unique($constants);
    }


}
