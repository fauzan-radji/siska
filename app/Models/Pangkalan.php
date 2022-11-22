<?php

namespace App\Models;

use App\Models\Jadwal;
use App\Models\Kwarran;
use App\Models\Pembina;
use App\Models\PesertaDidik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pangkalan extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function kwarran()
  {
    return $this->belongsTo(Kwarran::class);
  }

  public function pembinas()
  {
    return $this->hasMany(Pembina::class);
  }

  public function peserta_didiks()
  {
    return $this->hasMany(PesertaDidik::class);
  }

  public function jadwals()
  {
    return $this->hasMany(Jadwal::class);
  }
}
