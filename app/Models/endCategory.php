<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class endCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        "end_category"
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
