<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =
            [
                [
                    'name' => 'Pożywienie',
                ],
                [
                    'name' => 'Zabawki',
                ],
                [
                    'name' => 'Pojemniki/Miski',
                ],
                [
                    'name' => 'Akcesoria',
                ],
                [
                    'name' => 'Pielęgnacja i higiena',
                ],
                [
                    'name' => 'Suplementy diety',
                ],
            ];

        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
