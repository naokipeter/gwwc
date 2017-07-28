<?php

use Illuminate\Database\Seeder;
use App\Donation;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate our existing records to start from scratch.
        Donation::truncate();

        $faker = \Faker\Factory::create();

        // Create a few donations in our database:
        for ($i = 0; $i < 100; $i++) {
            Donation::create([
                'charity'  => $faker->company,
                'amount'   => $faker->numberBetween(1, 1000) * 10,
                'currency' => $faker->randomElement(['EUR', 'USD', 'GBP', 'CHF']),
                'date'     => $faker->dateTimeBetween('-3 years'),
                'user_id'  => $faker->numberBetween(1, 11),
            ]);
        }
    }
}
