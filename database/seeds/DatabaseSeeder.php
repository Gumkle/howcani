<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('UserSeeder');
         $this->call('QiASeeder');
         $this->call('CommentsSeeder');
         $this->call('RatingsSeeder');
    }
}
