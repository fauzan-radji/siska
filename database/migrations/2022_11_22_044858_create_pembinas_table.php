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
    Schema::create('pembinas', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id');
      $table->foreignId('pangkalan_id')->nullable();
      $table->string('jabatan')->nullable();
      $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
      $table->string('no_hp')->nullable();
      $table->string('alamat')->nullable();
      $table->date('tanggal_lahir')->nullable();
      $table->string('foto')->nullable();
      $table->foreignId('agama_id')->nullable();
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
    Schema::dropIfExists('pembinas');
  }
};
