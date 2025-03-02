<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->string("slug")->nullable();
            $table->decimal("price", 10, 2)->default(1.00);
            $table->decimal("old_price", 10, 2)->default(1.00);
            $table->foreignId("top_category_id")->constrained("top_categories")->cascadeOnDelete();
            $table->foreignId("mid_category_id")->constrained("mid_categories")->cascadeOnDelete();
            $table->foreignId("end_category_id")->constrained("end_categories")->cascadeOnDelete();
            $table->foreignId("color_id")->nullable()->constrained("colors")->cascadeOnDelete();
            $table->foreignId("size_id")->nullable()->constrained("sizes")->cascadeOnDelete();
            $table->boolean("isOffered")->default(false);
            $table->decimal("price_offered", 10, 2)->nullable()->default(1.00);
            $table->boolean("active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
