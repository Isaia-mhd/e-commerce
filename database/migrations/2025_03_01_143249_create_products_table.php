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
            $table->string("description");
            $table->string("slug")->nullable();
            $table->unsignedFloat("price")->default(1.00);
            $table->unsignedFloat("old_price")->default(1.00);
            $table->foreignId("topCategory_id");
            $table->foreignId("midCategory_id");
            $table->foreignId("endCategory_id");
            $table->foreignId("color_id")->nullable();
            $table->foreignId("size_id")->nullable();
            $table->boolean("isOffered")->default(false);
            $table->unsignedFloat("price_offered")->nullable()->default(1);
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
