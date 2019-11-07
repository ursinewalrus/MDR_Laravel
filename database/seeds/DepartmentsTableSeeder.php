<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['Computer Science', 'Science', 'History', 'Mathematics'];

        foreach ($departments as $dept) {
            DB::table('departments')->insert([
                'name' => $dept,
            ]);
        }
    }
}
