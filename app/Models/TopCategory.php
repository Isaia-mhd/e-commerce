<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TopCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        "top_category", "slug"
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
