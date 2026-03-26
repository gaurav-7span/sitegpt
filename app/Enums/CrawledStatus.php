<?php

namespace App\Enums;

enum CrawledStatus: string
{
    case Pending  = 'pending';
    case Crawling = 'crawling'; // fix typo too
    case Done     = 'done';
    case Failed   = 'failed';

    public static function default(): self
    {
        return self::Pending;
    }

    public function label(): string
    {
        return match ($this) {
            self::Pending  => 'Pending',
            self::Crawling => 'Crawling',
            self::Done     => 'Done',
            self::Failed   => 'Failed',
        };
    }

    public function isDone(): bool
    {
        return $this === self::Done;
    }
}
