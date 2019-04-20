<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preferences extends Model
{
    protected $table = 'pereference';
    protected $primaryKey = 'id_preference';
    protected $fillable = ['discussion','cigarette','musique','id_user'];
}
