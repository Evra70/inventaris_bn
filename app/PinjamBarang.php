<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PinjamBarang extends Model
{
   protected $table = "t_pinjam_barang";
   protected $primaryKey = "pinjam_id";
   public $timestamps = false;
}
