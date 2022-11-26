<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Admin::create([
      'user_id' => User::create([
        'nama' => 'admin',
        'username' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('12345678')
      ])->id,
    ]);
  }
}
