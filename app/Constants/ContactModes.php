<?php

namespace App\Constants;

use ReflectionClass;

/**
 * Class ContactModes
 * @package App\Constants
 */
final class ContactModes
{
    const PHONE = "phone";
    const EMAIL = "email";
    const NONE  = "none";

    /**
     * @return array
     */
    public static function all(): array
    {
        try {
            $reflectionClass = new ReflectionClass(__CLASS__);
        } catch (\Exception $e) {
            return [];
        }

        return $reflectionClass->getConstants();
    }
}
