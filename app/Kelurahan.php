<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
  public function Sekolah()
  {
    return $this->hasMany('App\Sekolah');
  }
}
