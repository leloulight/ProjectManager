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

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        //To delete the table data before creating new ones
        \App\Entities\Project::truncate();
        \App\Entities\Client::truncate();
        \App\Entities\User::truncate();

        factory(\App\Entities\User::class, 10)->create();
        factory(\App\Entities\Client::class, 10)->create();
        factory(\App\Entities\Project::class, 10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
