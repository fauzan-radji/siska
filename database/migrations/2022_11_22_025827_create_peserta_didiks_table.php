<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('peserta_didiks', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id');
      $table->foreignId('pangkalan_id');
      $table->foreignId('agama_id')->nullable();

      $table->enum('golongan', ['Siaga', 'Penggalang', 'Penegak', 'Pandega']);
      $table->string('foto');
      $table->string('no_anggota')->unique()->nullable();
      $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
      $table->string('no_hp')->nullable();
      $table->string('alamat')->nullable();
      $table->string('tempat_lahir')->nullable();
      $table->date('tanggal_lahir')->nullable();
      $table->enum('gol_darah', ['A', 'B', 'AB', 'O'])->nullable();
      $table->boolean('verified')->default(false);

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('peserta_didiks');
  }
};
