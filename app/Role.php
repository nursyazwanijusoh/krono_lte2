<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  use SoftDeletes;

  public function users()
  {
    return $this->belongsToMany(User::class);
  }

  public function createdby()
  {
    return $this->belongsTo(User::class, 'created_by');
  }

  public function permissions()
  {
    return $this->belongsToMany(Permission::class);
  }
}
