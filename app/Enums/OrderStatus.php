<?php

namespace App\Enums;

enum OrderStatus: String
{
    case PENDING = 'pending';

    case CONFIRMED = 'confirmed';

    case DELIVERED = 'delivered';

    static function values(): array
    {
        return \array_map(fn ($value) => $value->value, self::cases());
    }
}
