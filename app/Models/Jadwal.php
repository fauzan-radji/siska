<?php

namespace App\Models;

use App\Models\Poin;
use App\Models\Pembina;
use App\Models\Pangkalan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function pangkalan()
  {
    return $this->belongsTo(Pangkalan::class);
  }

  public function poins()
  {
    return $this->belongsToMany(Poin::class);
  }

  public function pembinas()
  {
    return $this->belongsToMany(Pembina::class);
  }

  // this is a recommended way to declare event handlers
  public static function boot()
  {
    parent::boot();

    static::deleting(function ($jadwal) { // before delete() method call this
      $jadwal->poins()->detach();
      $jadwal->pembinas()->detach();
      // do the rest of the cleanup...
    });
  }
}
