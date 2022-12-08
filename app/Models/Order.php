<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\ValueObjects\Price;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    protected function totalPrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Price::from($value),
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'order_items')
            ->as('orderItem')
            ->withPivot('total_price', 'total_quantity')
            ->withTimestamps();
    }
}
