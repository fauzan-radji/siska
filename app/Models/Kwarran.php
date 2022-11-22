<?php

namespace App\Models;

use App\Models\Pangkalan;
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
}
