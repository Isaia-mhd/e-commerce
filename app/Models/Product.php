<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public function topCategories(): BelongsTo
    {
        return $this->belongsTo(TopCategory::class, "top_category_id");
    }
    public function midCategories(): BelongsTo
    {
        return $this->belongsTo(MidCategory::class, "mid_category_id");
    }
    public function endCategories(): BelongsTo
    {
        return $this->belongsTo(EndCategory::class, "end_category_id");
    }
}
