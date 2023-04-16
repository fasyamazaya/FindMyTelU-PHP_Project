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
                "name" => "Bandung Techno Park",
                "description" => "",
                "address" => "Jl. Telekomunikasi, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257",
                "latitude" => "-6.970515",
                "longitude" => "107.630321"
            ],
            [
                "name" => "Telkom University Convention Hall",
                "description" => "",
                "address" => "Jl. Telekomunikasi No.20, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40267",
                "latitude" => "-6.971419",
                "longitude" => "107.631395"
            ],
            [
                "name" => "Telkom University Sport Centre",
                "description" => "",
                "address" => "Jl. Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257",
                "latitude" => "-6.971610",
                "longitude" => "107.628934"
            ],
            [
                "name" => "Gedung Tokong Nanas Telkom University",
                "description" => "",
                "address" => "2JGH+RV6, Sukapura, Dayeuhkolot, Bandung Regency, West Java 40257",
                "latitude" => "-6.972870",
                "longitude" => "107.629900"
            ],
            [
                "name" => "",
                "description" => "",
                "address" => "",
                "latitude" => "51.51934869999999",
                "longitude" => "-0.07468889999995554"
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
