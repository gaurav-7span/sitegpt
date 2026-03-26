<?php

namespace App\Enums;

enum ChatRole: string
{
    case User      = 'user';
    case Assistant = 'assistant';

    public static function default(): self
    {
        return self::User;
    }

    public function label(): string
    {
        return match ($this) {
            self::User      => 'User',
            self::Assistant => 'Assistant',
        };
    }
}
