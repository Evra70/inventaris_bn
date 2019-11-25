<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Barang extends Model
{
   protected $table = "t_barang";
   protected $primaryKey = "barang_id";
   public $timestamps = false;
}
