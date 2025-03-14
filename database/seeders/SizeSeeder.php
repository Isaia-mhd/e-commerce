<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include __DIR__ . "../../../Constants/Size.php";

        foreach ($Sizes as $size) {
            Size::create([
                "size" => $size,
            ]);
        }
    }
}
