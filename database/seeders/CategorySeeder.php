<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Web desain',
            'slug' => 'web-desain',
            'color' => 'orange'  
        ]);
        Category::create([
            'name' => 'Game',
            'slug' => 'game',
            'color' => 'red'  
        ]);
        Category::create([
            'name' => 'Programing',
            'slug' => 'programing',
            'color' => 'blue'  
        ]);
        Category::create([
            'name' => 'Sport',
            'slug' => 'sport',
            'color' => 'yellow'  
        ]);
        Category::create([
            'name' => 'Farm',
            'slug' => 'farm',
            'color' => 'green'  
        ]);
    }
}
