<?php

namespace CustomFormPlugin\Validation;


class EmailValidation implements Validation
{

    public final function isValid(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $value);
    }
}