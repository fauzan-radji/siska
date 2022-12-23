<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pembina;
use App\Models\Pangkalan;
use Illuminate\Database\Seeder;
use Symfony\Component\VarDumper\VarDumper;
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
    Pangkalan::factory(4)->create()->each(function ($pangkalan) {
      Pembina::create([
        'user_id' => User::create([
          'nama' => 'Admin Pangkalan ' . $pangkalan->nama,
          'username' => 'admin' . $pangkalan->id,
          'email' => 'adminpangkalan' . $pangkalan->id . '@gmail.com',
          'password' => bcrypt('12345678')
        ])->id,
        'pangkalan_id' => $pangkalan->id,
        'jabatan' => 'Admin Pangkalan',
        'gender' => fake()->regexify('(Laki-laki|Perempuan)'),
        'no_hp' => fake()->phoneNumber(),
        'alamat' => fake()->address(),
        'tanggal_lahir' => fake()->date('Y-m-d', '-30 years'),
        'agama_id' => mt_rand(1, 5)
      ]);
    });
  }
}
