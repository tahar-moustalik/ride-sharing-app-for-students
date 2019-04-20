<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    //
    protected $table = 'vehicule';
    protected $primaryKey = 'id_vehicule';
    protected $fillable = ['type','matricule','couleur','photo','id_user'];
}
