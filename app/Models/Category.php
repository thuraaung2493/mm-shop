<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }

    public function subcategoriesCount(): int
    {
        return $this->subcategories->count();
    }

    public function itemsCount(): int
    {
        return $this->subcategories->sum(fn ($subcategory) => $subcategory->itemsCount());
    }
}
