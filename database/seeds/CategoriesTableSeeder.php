<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = [
            [
                'id'    => '1',
                'name' => 'Gedung Perkantoran',
            ],
            [
                'id'    => '2',
                'name' => 'Gedung Perkuliahan',
            ],
            [
                'id'    => '3',
                'name' => 'Kantin',
            ],
            [
                'id'    => '4',
                'name' => 'Cafe',
            ],
            [
                'id'    => '5',
                'name' => 'Area Parkir',
            ],
            [
                'id'    => '6',
                'name' => 'Tempat Ibadah',
            ],
            [
                'id'    => '7',
                'name' => 'ATM',
            ],
            [
                'id'    => '8',
                'name' => 'Pusat Bahasa',
            ],
            [
                'id'    => '9',
                'name' => 'Perpustakaan',
            ],
            [
                'id'    => '10',
                'name' => 'Taman',
            ],
            [
                'id'    => '11',
                'name' => 'Coworking Space',
            ],
            [
                'id'    => '12',
                'name' => 'KU1.XX.YY',
            ],
            [
                'id'    => '13',
                'name' => 'PS1.XX.YY',
            ],
            [
                'id'    => '14',
                'name' => 'RO3.XX.YY',
            ],
            [
                'id'    => '15',
                'name' => 'KU3.XX.YY',
            ],
            [
                'id'    => '16',
                'name' => 'TULT.XXYY',
            ],
            [
                'id'    => '17',
                'name' => 'Kantin',
            ],
            [
                'id'    => '18',
                'name' => 'Asrama',
            ],
            [
                'id'    => '19',
                'name' => 'Gedung Serbaguna',
            ],
            [
                'id'    => '20',
                'name' => 'Gedung Olahraga',
            ],
            [
                'id'    => '21',
                'name' => 'Gate',
            ],
            [
                'id'    => '22',
                'name' => '',
            ],
            [
                'id'    => '23',
                'name' => '',
            ],
            [
                'id'    => '24',
                'name' => '',
            ],
            [
                'id'    => '25',
                'name' => '',
            ],
        ];
        Category::insert($categories);

        foreach(range(25,50) as $id)
        {
            Category::create([
                'name' => $faker->unique()->sentence(1)
            ]);
        }
    }
}
