<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profils extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';
    protected $fillable = ['nom','prenom','email','adr','tel','age','photo','univ','sexe','id_user'];
}
