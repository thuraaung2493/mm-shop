<?php

namespace App\Enums;

enum ItemStatus: String
{
    case INSTOCK = 'inStock';

    case OUTSTOCK = 'outStock';

    static function values(): array
    {
        return \array_map(fn ($value) => $value->value, self::cases());
    }
}
