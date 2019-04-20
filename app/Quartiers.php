<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quartiers extends Model
{
     protected $table = 'quartiers';
    protected $primaryKey = 'id_quart';
    protected $fillable = ['nomq'];

}
