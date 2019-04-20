<?php

namespace App;

use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
class Utilisateur extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use Messagable;
    protected $table = 'utilisateur';
    protected $primaryKey = 'id_user';
    protected $fillable = ['login','email','pass','verifyToken'];
  public function user()
    {
        return $this->belongsTo('App\Utilisateur','id_user');
    }



}
