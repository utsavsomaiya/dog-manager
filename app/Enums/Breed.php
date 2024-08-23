<?php

namespace App\Enums;

enum Breed: string
{
    case AKITA = 'Akita';
    case AFFENPINSCHER = 'Affenpinscher';
    case AFGHAN_HOUND = 'Afghan Hound';
    case AUSTRALIAN_KELPIE = 'Australian Kelpie';

    public static function values(): array
    {
        return collect(self::cases())
            ->pluck('value')
            ->toArray();
    }
}
