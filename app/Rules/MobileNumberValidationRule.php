<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MobileNumberValidationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param string $mobileNumber
     *
     * @return bool
     */
    public function passes($attribute, $mobileNumber)
    {
        if (!is_numeric($mobileNumber)) {
            return false;
        }

        return Str::startsWith($mobileNumber, '98') && strlen($mobileNumber) === 10;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Invalid mobile number.';
    }
}
