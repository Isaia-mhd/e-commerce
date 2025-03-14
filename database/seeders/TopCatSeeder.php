<?php

namespace Database\Seeders;

use App\Models\TopCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TopCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include __DIR__ . "../../../Constants/Top.php";

        foreach ($Tops as $top) {
            TopCategory::create([
                "top_category" => $top,
                "slug" => Str::slug($top)
            ]);
        }
    }
}
