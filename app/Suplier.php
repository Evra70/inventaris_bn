<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Suplier extends Model
{
   protected $table = "t_suplier";
   protected $primaryKey = "suplier_id";
   public $timestamps = false;
}
