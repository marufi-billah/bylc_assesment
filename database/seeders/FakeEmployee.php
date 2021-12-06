<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FakeEmployee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

    	foreach (range(1,200) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'phone' => $faker->numerify('###########'),
                'status' => 'active',
                'role' => 'employee',
                'password' => Hash::make($faker->password),
            ]);
        }
    }
}
