<?php

namespace App\Models;

use App\Models\Poin;
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

  public function poins()
  {
    return $this->belongsToMany(Poin::class)->withPivot('teruji');
  }

  // this is a recommended way to declare event handlers
  public static function boot()
  {
    parent::boot();

    //after create() method call this
    static::created(function ($peserta_didik) {
      $poins = Poin::where('agama_id', $peserta_didik->agama_id)->orWhereNull('agama_id')->get();
      $peserta_didik->poins()->attach($poins);
    });

    //after update() method call this
    static::updated(function ($peserta_didik) {
      $poins = Poin::where('agama_id', $peserta_didik->agama_id)->orWhereNull('agama_id')->get();
      $peserta_didik->poins()->sync($poins);
    });

    // before delete() method call this
    static::deleting(function ($peserta_didik) {
      $peserta_didik->user->delete();
    });
  }
}
