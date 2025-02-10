<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animals =
            [
                [
                    'name' => 'Psy',
                ],
                [
                    'name' => 'Koty',
                ],
                [
                    'name' => 'Gryzonie',
                ],
                [
                    'name' => 'Gołębie',
                ],
                [
                    'name' => 'Drób',
                ],
                [
                    'name' => 'Zwierzęta gosp.',
                ],
            ];

        foreach ($animals as $key => $value) {
            Animal::create($value);
        }
    }
}
