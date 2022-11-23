<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PesertaDidik;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesertaDidikSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = new User();
    $user->nama = 'Shafira Thalib Peserta';
    $user->username = 'pesertadidik';
    $user->email = 'pesertadidik@gmail.com';
    $user->password = bcrypt('12345678');
    $user->save();

    PesertaDidik::create([
      'user_id' => $user->id,
      'pangkalan_id' => 1,
      'gender' => 'Perempuan',
      'no_hp' => '089999999999',
      'alamat' => 'Jalan Jeruk, Kecamatan Dungingi, Kelurahan Huangobotu',
      'tanggal_lahir' => '2003-12-08',
      'foto' => 'https://api.multiavatar.com/shaphire.svg',
      'agama_id' => 1
    ]);

    PesertaDidik::factory(250)->create();
  }
}
