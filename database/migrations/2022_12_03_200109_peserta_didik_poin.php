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
    Schema::create('peserta_didik_poin', function (Blueprint $table) {
      $table->id();
      $table->foreignId('peserta_didik_id');
      $table->foreignId('poin_id');
      $table->boolean('teruji')->default(false);
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
    Schema::dropIfExists('peserta_didik_poin');
  }
};
