<?php

use Illuminate\Database\Seeder;
use App\Income;

class IncomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate our existing records to start from scratch.
        Income::truncate();

        $faker = \Faker\Factory::create();

        // Create a few incomes in our database:
        $year      = date('Y') - 2;
        $userCount = 11 - 2 * 3;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 1; $j <= $userCount; $j++) {
                Income::create([
                    'amount'             => $faker->numberBetween(10, 2500) * 100,
                    'currency'           => $faker->randomElement(['EUR', 'USD', 'GBP', 'CHF']),
                    'year'               => $year,
                    'user_id'            => !$i && !$j ? 1 : $j,
                    'percentage_pledged' => 10,
                ]);
            }

            $year++;
            $userCount += 3;
        }
    }
}
