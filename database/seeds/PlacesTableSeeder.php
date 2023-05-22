<?php

use App\Category;
use App\Role;
use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
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
                "name" => "Gedung Bangkit",
                "description" => "Gedung Bangkit atau Gedung Rektorat merupakan kantor rektorat kampus di Kota Bandung. Kantor ini merupakan kantor rektor beserta jajaran pimpinan tinggi perguruan tinggi / univeristas.",
                "address" => "Jl. Telekomunikasi Terusan Buah Batu, Dayeuhkolot, Sukapura, Kec. Dayeuhkolot, Bandung, Jawa Barat",
                "latitude" => "-6.973951100000001",
                "longitude" => "107.63046689999999"
            ],
            [
                "name" => "Gedung Graha Wiyata Cacuk Sudarijanto - A",
                "description" => "Gedung kuliah ini memiliki 16 ruang kelas dengan kapasistas 80 orang dan 78 ruang kelas dengan kapasitas 40. Jika ditotal, gedung ini mampu menampung 4.400 orang.",
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.9743981",
                "longitude" => "107.631081557393"
            ],
            [
                "name" => "Green Lounge Telkom University",
                "description" => "Merupakan sebuah taman yang terletak di belakang Gedung Bangkit (Rektorat)",
                "address" => "2JGJ+93G, Sukapura, Dayeuhkolot, Bandung Regency, West Java",
                "latitude" => "-6.974052186633375",
                "longitude" => "107.63022718936335"
            ],
            [
                "name" => "Language Center Telkom University",
                "description" => "Pusat Bahasa Lembaga Telkom University",
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.9749335486470825",
                "longitude" => "107.63120040101431"
            ],
            [
                "name" => "Telkom University Landmark Tower",
                "description" => "",
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.968945",
                "longitude" => "107.628076"
            ],
            [
                "name" => "Masjid Syamsul Ulum Telkom University",
                "description" => "",
                "address" => "Jl. Telekomunikasi, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257",
                "latitude" => "-6.975528853281067",
                "longitude" => "107.63228715063087"
            ],
            [
                "name" => "Gedung Tokong Nanas",
                "description" => "",
                "address" => "Jl. Telekomunikasi No.20, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40267",
                "latitude" => "-6.972787023447546",
                "longitude" => "107.62969663051702
                "
            ],
            [
                "name" => "Gedung Karang",
                "description" => "",
                "address" => "Jl. Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257",
                "latitude" => "-6.975559814847304",
                "longitude" => "107.63158097458823"
            ],
            [
                "name" => "Gedung Panehan",
                "description" => "",
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.975521832512069",
                "longitude" => "107.63129667547787"
            ],
            [
                "name" => "Gedung Panambulai",
                "description" => "",
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.975824640374241",
                "longitude" => "107.63055996000993"
            ],
            [
                "name" => "TelU Coffee",
                "description" => "",
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.973061470255623",
                "longitude" => "107.62953161406766"
            ],
            [
                "name" => "Open Library Telkom University",
                "description" => "",
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "-6.971545904756654",
                "longitude" => "107.63246561276381"
            ],
            [
                "name" => "",
                "description" => "",
                "address" => "Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat",
                "latitude" => "",
                "longitude" => ""
            ],
        ];
        $currentAddress = 0;

        foreach($users as $user)
        {
            $place = [
                'name' => $faker->company,
                'description' => $faker->paragraph,
                'address' => $faker->address,
                'active' => 1,
            ];
            $place = $user->places()->create(array_merge($place, $addresses[$currentAddress++]));
            //$place->categories()->sync($categories->random(rand(0,3)));

            foreach($pictures->random(rand(1,3)) as $index)
            {
                $place->addMedia(public_path("assets/images/places/a$index.jpg"))->preservingOriginal()->toMediaCollection('photos');
            }
        }
    }
}
