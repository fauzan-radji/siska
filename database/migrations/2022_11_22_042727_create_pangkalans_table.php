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
    Schema::create('pangkalans', function (Blueprint $table) {
      $table->id();
      $table->foreignId('kwarran_id');
      $table->string('nama');
      $table->enum('jenjang_pembinaan', ['Siaga', 'Penggalang', 'Penegak', 'Pandega']);
      $table->string('alamat');
      $table->string('no_gudep')->nullable();
      $table->string('ambalan')->nullable();
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
    Schema::dropIfExists('pangkalans');
  }
};
