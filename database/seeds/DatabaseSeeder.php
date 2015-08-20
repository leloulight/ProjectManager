<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \App\Client::truncate(); //To delete the table data before creating new ones
        factory(\App\Client::class, 10)->create();

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
