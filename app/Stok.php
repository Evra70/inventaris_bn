<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stok extends Model
{
   protected $table = "t_stok";
   protected $primaryKey = "barang_id";
   public $timestamps = false;
}
