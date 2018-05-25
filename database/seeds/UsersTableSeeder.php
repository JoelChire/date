<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
  public function run()
  {
      User::create([
        'name' => 'Rocio',
        'email' => 'joel.chire33@gmail.com',
        'password' => bcrypt('123456789'),
        'role' => '0',
        'foto' => 'users/000.jpg',
        'remember_token' => 'w4Kg7RP52tA48fgj9DKtdlOD1osLK02SLoNNkeSlmnzPEYa1POuqXTu058cK',
      ]);
  }
}
