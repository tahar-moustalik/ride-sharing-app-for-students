<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Utilisateur;
use Carbon\Carbon;

class PrivateMessage extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id_mess';
    protected $fillable = ['emet_id','recep_id','sujet','message','nbrKM','lue'];
    protected $appends = ['emmetter','recepteur'];

    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
    public function getSenderAttribute()
    {
        return Utilisateur::where('id_user', $this->emet_id)->first();
    }
    public function getReceiverAttribute()
    {
        return Utilisateur::where('id_user', $this->recep_id)->first();
    }
}
