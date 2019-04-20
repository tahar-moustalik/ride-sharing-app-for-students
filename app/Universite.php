<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    protected $table = 'universite';
    protected $primaryKey = 'id_univ';
    protected $fillable = ['acro_univ','adr','nom'];

}
