<?php

namespace Database\Seeders;

use App\Models\PesertaDidik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesertaDidikSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    PesertaDidik::factory(750)->create();
  }
}
