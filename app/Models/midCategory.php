<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class midCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        "mid_category"
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
