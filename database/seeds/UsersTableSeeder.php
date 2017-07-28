<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the users table first
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = \Faker\Factory::create();

        // Make sure everyone has the same password
        $password = Hash::make('gwwc');

        User::create([
            'name'       => 'John Doe',
            'email'      => 'admin@test.com',
            'password'   => $password,
            'pledge'     => 10,
            'role'       => 'ADMIN',
            'api_token'  => 'LoHEVj8dcdmPXMmtgqDgb0i9VGQRzYJMWQ5qh1KSBFOmUle9fnWT0SDEV9Uc',
            'pledged_at' => $faker->dateTimeBetween('-3 years', '-1 year'),
        ]);

        // Let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name'       => $faker->name,
                'email'      => $faker->email,
                'password'   => $password,
                'pledge'     => 10, // $faker->numberBetween(2, 18) * 5
                'role'       => 'USER',
                'pledged_at' => $faker->dateTimeBetween('-3 years'),
            ]);
        }
    }
}
