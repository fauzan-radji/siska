<?php

namespace Database\Seeders;

use App\Models\Poin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoinSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Poin::create([
      'nomor' => "1.1.1",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 1
    ]);
    Poin::create([
      'nomor' => "1.1.2",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 1
    ]);
    Poin::create([
      'nomor' => "1.1.3",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 1
    ]);

    Poin::create([
      'nomor' => "1.2.1",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 2
    ]);
    Poin::create([
      'nomor' => "1.2.2",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 2
    ]);
    Poin::create([
      'nomor' => "1.2.3",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 2
    ]);

    Poin::create([
      'nomor' => "1.3.1",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 3
    ]);
    Poin::create([
      'nomor' => "1.3.2",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 3
    ]);
    Poin::create([
      'nomor' => "1.3.3",
      'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod illum praesentium at, id eum pariatur accusamus aut et debitis consequuntur eos voluptates impedit earum placeat quos eius quidem reiciendis, beatae ut iusto fuga delectus incidunt aliquam. Praesentium, sapiente, debitis soluta repellendus nemo aliquid tenetur et earum sunt ea odit dolor?',
      'agama_id' => 3
    ]);

    Poin::create([
      'nomor' => '2',
      'isi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur placeat dolorum minima quos ex nemo doloremque, quis optio iure voluptatem!',
      'agama_id' => null
    ]);

    Poin::create([
      'nomor' => '3',
      'isi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur placeat dolorum minima quos ex nemo doloremque, quis optio iure voluptatem!',
      'agama_id' => null
    ]);

    Poin::create([
      'nomor' => '4',
      'isi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur placeat dolorum minima quos ex nemo doloremque, quis optio iure voluptatem!',
      'agama_id' => null
    ]);

    Poin::create([
      'nomor' => '5',
      'isi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur placeat dolorum minima quos ex nemo doloremque, quis optio iure voluptatem!',
      'agama_id' => null
    ]);
  }
}
