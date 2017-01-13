<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();; 
        foreach (range(1, 55) as $key => $value) {
        	App\Student::create([
        		 'name' => $faker->name,
        'father_name' => $faker->name('male'),
        'mother_name' => $faker->name('female'),
        'phone_number' => $faker->phoneNumber,
        'home_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'gender' => 'male',
        'roll_number' => $faker->randomNumber(),
        'reg_number' => $faker->randomNumber(),
        'department_id' => $faker->randomNumber(1),
        'shift' => 'second',
        'semester' => 'eight',
        'present_address' => $faker->address,
        'permanent_address' => $faker->address,
        	]);
        }
    }
}
