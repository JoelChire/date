<?php

use Illuminate\Database\Seeder;
use App\Facultade;

class FacultadesTableSeeder extends Seeder
{
    public function run()
    {
      Facultade::create([
        'sigla' => 'FAIN'
      ]);
      Facultade::create([
        'sigla' => 'FACI'
      ]);
      Facultade::create([
        'sigla' => 'FACS'
      ]);
      Facultade::create([
        'sigla' => 'FCAG'
      ]);
      Facultade::create([
        'sigla' => 'FCJE'
      ]);
      Facultade::create([
        'sigla' => 'FECH'
      ]);
      Facultade::create([
        'sigla' => 'FIAG'
      ]);
    }
}
