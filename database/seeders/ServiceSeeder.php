<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Chirurgia tkanek miękkich',
                'slug' => 'chirurgia-tkanek-miekkich',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 80,
            ],
            [
                'name' => 'Dermatologia',
                'slug' => 'dermatologia',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 110,
            ],
            [
                'name' => 'EKG',
                'slug' => 'ekg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 120,
            ],
            [
                'name' => 'Fryzjerstwo',
                'slug' => 'fryzjerstwo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 30,
            ],
            [
                'name' => 'Ortopedia',
                'slug' => 'ortopedia',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 60,
            ],
            [
                'name' => 'Sterylizacja i kastracja',
                'slug' => 'sterylizacja-i-kastracja',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 65,
            ],
            [
                'name' => 'Okulistyka',
                'slug' => 'okulistyka',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 80,
            ],
            [
                'name' => 'Stomatologia',
                'slug' => 'stomatologia',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 75,
            ],
            [
                'name' => 'RTG',
                'slug' => 'rtg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 105,
            ],
            [
                'name' => 'USG',
                'slug' => 'usg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 112,
            ],
            [
                'name' => 'Badania laboratoryjne',
                'slug' => 'badania-laboratoryjne',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 140,
            ],
            [
                'name' => 'Szczepienia ochronne',
                'slug' => 'szczepienia-ochronne',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 45,
            ],
            [
                'name' => 'Rozród i położnictwo',
                'slug' => 'rozrod-i-poloznictwo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 90,
            ],
            [
                'name' => 'Chirurgia ogólna',
                'slug' => 'chirurgia-ogolna',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Ut risus dui, imperdiet eget risus sed, vulputate interdum justo.
                Proin vulputate magna malesuada pulvinar dapibus. Curabitur tempor,
                mi nec lobortis pellentesque, ipsum risus luctus orci, sed pellentesque ante tellus
                nec lectus. Suspendisse pharetra consectetur lacus, in iaculis tortor.
                Suspendisse aliquam ultrices ullamcorper.',
                'price' => 150,
            ],
        ];

        foreach ($services as $key => $value)
        {
            Service::create($value);
        }
    }
}
