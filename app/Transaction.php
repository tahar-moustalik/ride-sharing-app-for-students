<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transact';
    protected $primaryKey = 'id_trns';
    protected $fillable = ['id_conduct','id_dmd','id_trajet','confirme'];
}
