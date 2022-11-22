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
    $user = new User();
    $user->nama = 'admin';
    $user->username = 'admin';
    $user->email = 'admin@gmail.com';
    $user->password = bcrypt('12345678');
    $user->save();

    Admin::create([
      'user_id' => $user->id,
    ]);
  }
}
