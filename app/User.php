<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   protected $table = "t_user";
   protected $primaryKey = "user_id";
   public $timestamps = false;
}
