<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajets extends Model
{
    protected $table = 'trajet';
    protected $primaryKey = 'id_trajet';
    protected $fillable = ['des','src','date_pub','date_dep','nbrKM','id_proposeur'];
    protected $date = ['date_dep','date_pub'];
}
