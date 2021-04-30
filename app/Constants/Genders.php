<?php

namespace App\Constants;

use ReflectionClass;

/**
 * Class Genders
 * @package App\Constants
 */
final class Genders
{
    const MALE   = "male";
    const FEMALE = "female";
    const OTHER  = "other";

    /**
     * @return array
     */
    public static function all():array
    {
        try {
            $reflectionClass = new ReflectionClass(__CLASS__);
        } catch ( \Exception $e ) {
            return [];
        }

        return $reflectionClass->getConstants();
    }
}
