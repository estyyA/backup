<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=1;$i<100;$i++) 
        {
            DB::table('movies')->insert([
                'title' => $faker->sentence(),
                'genre' => $faker->word(),
                'year' => $faker->year(),
                'poster' => $faker->url(),
            ]);
        }
       
    }
}
