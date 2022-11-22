<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgamaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Agama::create(['nama' => 'Islam']);
    Agama::create(['nama' => 'Katholik']);
    Agama::create(['nama' => 'Kristen Protestan']);
    Agama::create(['nama' => 'Hindu']);
    Agama::create(['nama' => 'Buddha']);
  }
}
