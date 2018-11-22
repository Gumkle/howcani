<?php

use Illuminate\Database\Seeder;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Rating::class, 25)->create();
    }
}
