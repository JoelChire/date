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
      $this->call([
            FacultadesTableSeeder::class,
            EscuelasTableSeeder::class,
            UsersTableSeeder::class,
    	]);
    }
}
