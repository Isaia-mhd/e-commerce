<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ColorSeeder extends Seeder
{
    
    
    public function run(): void
    {
        include __DIR__ . "../../../Constants/Color.php";
        

        foreach ($Colors as $color) {
            Color::create([
                "color" => $color
            ]);
        }
    }
}
