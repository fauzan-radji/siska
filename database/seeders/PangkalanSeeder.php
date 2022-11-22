<?php

namespace Database\Seeders;

use App\Models\Pangkalan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PangkalanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Pangkalan::factory(25)->create();
  }
}
