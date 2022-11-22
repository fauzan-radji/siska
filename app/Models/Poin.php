<?php

namespace App\Models;

use App\Models\Agama;
use App\Models\Jadwal;
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
}
