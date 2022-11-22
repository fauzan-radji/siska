<?php

namespace Database\Seeders;

use App\Models\Kwarran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KwarranSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Kwarran::factory(5)->create();
  }
}
