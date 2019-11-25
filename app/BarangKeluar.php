<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BarangKeluar extends Model
{
   protected $table = "t_barang_keluar";
   protected $primaryKey = "barang_keluar_id";
   public $timestamps = false;
}
