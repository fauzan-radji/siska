<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // this is a recommended way to declare event handlers
  public static function boot()
  {
    parent::boot();

    static::deleting(function ($admin) { // before delete() method call this
      $admin->user->delete();
      // do the rest of the cleanup...
    });
  }
}
