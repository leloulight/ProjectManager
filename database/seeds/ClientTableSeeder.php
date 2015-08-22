<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Client::truncate(); //To delete the table data before creating new ones
        factory(\App\Entities\Client::class, 10)->create();
    }
}
