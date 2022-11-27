<?php

namespace App\Models;

use App\Models\User;
use App\Models\Agama;
use App\Models\Pangkalan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesertaDidik extends Model
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

  // this is a recommended way to declare event handlers
  public static function boot()
  {
    parent::boot();

    static::deleting(function ($peserta_didik) { // before delete() method call this
      $peserta_didik->user->delete();
    });
  }
}
