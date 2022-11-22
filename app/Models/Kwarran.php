<?php

namespace App\Models;

use App\Models\Pembina;
use App\Models\Pangkalan;
use App\Models\PesertaDidik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kwarran extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function pangkalans()
  {
    return $this->hasMany(Pangkalan::class);
  }

  public function peserta_didiks()
  {
    return $this->hasManyThrough(PesertaDidik::class, Pangkalan::class);
  }

  public function pembinas()
  {
    return $this->hasManyThrough(Pembina::class, Pangkalan::class);
  }
}
