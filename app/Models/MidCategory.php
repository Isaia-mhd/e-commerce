<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MidCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        "mid_category", "slug"
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
