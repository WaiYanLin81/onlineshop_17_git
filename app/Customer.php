<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
     'phoneno', 'address', 'user_id'
  ];
}
