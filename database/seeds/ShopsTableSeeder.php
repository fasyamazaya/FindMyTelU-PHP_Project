<?php

use App\Category;
use App\Role;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $pictures = collect(range(1,11));
        $users = Role::findOrFail(2)->users;
        $categories = Category::all()->pluck('id');

        $addresses = [
            [
                "address" => "Jl. Telekomunikasi Terusan Buah Batu, Dayeuhkolot, Sukapura, Kec. Dayeuhkolot, Bandung, Jawa Barat",
                "latitude" => "-6.973951100000001",
                "longitude" => "107.63046689999999"
            ],
            [
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.9743981",
                "longitude" => "107.631081557393"
            ],
            [
                "address" => "2JGJ+93G, Sukapura, Dayeuhkolot, Bandung Regency, West Java",
                "latitude" => "-6.974052186633375",
                "longitude" => "107.63022718936335"
            ],
            [
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.9749335486470825",
                "longitude" => "107.63120040101431"
            ],
            [
                "address" => "Brick Lane Sunday Market, Brick Lane, London",
                "latitude" => "51.5212073",
                "longitude" => "-0.0718159000000469"
            ],
            [
                "address" => "The Harry Potter Shop at Platform 9 3/4, Pancras Road, London",
                "latitude" => "51.5321845",
                "longitude" => "-0.12392169999998259"
            ],
            [
                "address" => "The Beekeeper Honey - London Essex UK, Goodmayes Lane, London, Ilford",
                "latitude" => "51.5577173",
                "longitude" => "0.1089951999999812"
            ],
            [
                "address" => "Sainsbury's, London Road, Forest Hill, London",
                "latitude" => "51.4397092",
                "longitude" => "-0.055361199999993005"
            ],
            [
                "address" => "Lidl, Sydenham Road, London",
                "latitude" => "51.4253218",
                "longitude" => "-0.04806940000003124"
            ],
            [
                "address" => "CHANEL Old Spitalfields Market, Commercial Street, London",
                "latitude" => "51.51934869999999",
                "longitude" => "-0.07468889999995554"
            ],
        ];
        $currentAddress = 0;

        foreach($users as $user)
        {
            $shop = [
                'name' => $faker->company,
                'description' => $faker->paragraph,
                'address' => $faker->address,
                'active' => 1,
            ];
            $shop = $user->shops()->create(array_merge($shop, $addresses[$currentAddress++]));
            $shop->categories()->sync($categories->random(rand(0,3)));

            foreach($pictures->random(rand(1,3)) as $index)
            {
                $shop->addMedia(public_path("assets/images/shops/a$index.jpg"))->preservingOriginal()->toMediaCollection('photos');
            }
        }
    }
}
