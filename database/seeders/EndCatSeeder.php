<?php

namespace Database\Seeders;

use App\Models\endCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EndCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include __DIR__ . "../../../Constants/End.php";


        foreach ($Ends as $end) {
            endCategory::create([
                "end_category" => $end,
                "slug" => Str::slug($end)
            ]);
        }
    }
}
