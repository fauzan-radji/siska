<?php

namespace App\Models;

use App\Models\Poin;
use App\Models\Pembina;
use App\Models\PesertaDidik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agama extends Model
{
  use HasFactory;

  public function pembinas()
  {
    return $this->hasMany(Pembina::class);
  }

  public function peserta_didiks()
  {
    return $this->hasMany(PesertaDidik::class);
  }

  public function poins()
  {
    return $this->hasMany(Poin::class);
  }
}
