<?php

namespace App\Models;

use App\Models\Agama;
use App\Models\Jadwal;
use App\Models\PesertaDidik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poin extends Model
{
  use HasFactory;

  public function agama()
  {
    return $this->belongsTo(Agama::class);
  }

  public function jadwals()
  {
    return $this->belongsToMany(Jadwal::class);
  }

  public function peserta_didiks()
  {
    return $this->belongsToMany(PesertaDidik::class)->withPivot('teruji');
  }
}
