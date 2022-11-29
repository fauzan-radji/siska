<?php

namespace App\Models;

use App\Models\User;
use App\Models\Agama;
use App\Models\Jadwal;
use App\Models\Pangkalan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembina extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function pangkalan()
  {
    return $this->belongsTo(Pangkalan::class);
  }

  public function agama()
  {
    return $this->belongsTo(Agama::class);
  }

  public function jadwals()
  {
    return $this->belongsToMany(Jadwal::class);
  }

  // this is a recommended way to declare event handlers
  public static function boot()
  {
    parent::boot();

    static::deleting(function ($pembina) { // before delete() method call this
      $pembina->user->delete();

      $pembina->jadwals()->detach();
      // do the rest of the cleanup...
    });
  }
}
