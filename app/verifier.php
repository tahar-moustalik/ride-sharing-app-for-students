<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verifier extends Model
{
  protected $table = 'verif';
  protected $primaryKey = 'id_verif';
  protected $fillable = ['id_user','id_admin','cin','img_cin','updated_at','created_at'];
}
