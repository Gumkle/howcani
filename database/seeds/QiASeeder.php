<?php

use Illuminate\Database\Seeder;

class QiASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Answer::class, 75)->create();
        factory(App\Question::class, 25)->create();
    }
}
