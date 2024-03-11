<?php

namespace App\Enum;

enum ContactPreference: string
{
    case Email = 'email';

    case Phone = 'phone';

    public static function valuesToArray(): array
    {
        return [
            ContactPreference::Email->value,
            ContactPreference::Phone->value,
        ];
    }
}
