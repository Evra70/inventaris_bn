<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BarangMasuk extends Model
{
   protected $table = "t_barang_masuk";
   protected $primaryKey = "barang_masuk_id";
   public $timestamps = false;
}
