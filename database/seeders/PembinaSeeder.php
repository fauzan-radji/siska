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
    $user = new User();
    $user->nama = 'Shafira Thalib Pembina';
    $user->username = 'pembina';
    $user->email = 'pembina@gmail.com';
    $user->password = bcrypt('12345678');
    $user->save();

    Pembina::create([
      'user_id' => $user->id,
      'pangkalan_id' => 1,
      'jabatan' => 'pembina',
      'gender' => 'Perempuan',
      'no_hp' => '089999999999',
      'alamat' => 'Jalan Jeruk, Kecamatan Dungingi, Kelurahan Huangobotu',
      'tanggal_lahir' => '2003-12-08',
      'foto' => 'https://api.multiavatar.com/shaphire',
      'agama_id' => 1
    ]);

    Pembina::factory(99)->create();
  }
}
