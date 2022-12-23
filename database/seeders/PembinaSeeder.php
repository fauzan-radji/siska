<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pembina;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PembinaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Pembina::create([
      'user_id' => User::create([
        'nama' => 'Shafira Thalib Pembina',
        'username' => 'pembina',
        'email' => 'pembina@gmail.com',
        'password' => bcrypt('12345678')
      ])->id,
      'pangkalan_id' => 1,
      'jabatan' => 'Admin Pangkalan',
      'gender' => 'Perempuan',
      'no_hp' => '089999999999',
      'alamat' => 'Jalan Jeruk, Kecamatan Dungingi, Kelurahan Huangobotu',
      'tanggal_lahir' => '2003-12-08',
      // 'foto' => 'https://api.multiavatar.com/shaphire.svg',
      'agama_id' => 1
    ]);

    Pembina::factory(9)->create();
  }
}
