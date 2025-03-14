<?php

namespace Database\Seeders;

use App\Models\midCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MidCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include __DIR__ . "../../../Constants/Mid.php";


        foreach ($Mids as $mid) {
            midCategory::create([
                "mid_category" => $mid,
                "slug" => Str::slug($mid)
            ]);
        }
    }
}
