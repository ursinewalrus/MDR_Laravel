<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            DB::table('students')->insert([
                'name' => $faker->name,
                'gender' => $faker->randomElement(['m', 'f']),
                'dept_id' => $faker->randomElement([1, 2, 3, 4])
            ]);
        }
    }
}
