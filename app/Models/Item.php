<?php

namespace App\Models;

use App\Enums\ItemStatus;
use App\ValueObjects\Price;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => ItemStatus::class,
    ];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Price::from($value),
        );
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->as('orderItems')
            ->withTimestamps();
    }
}
