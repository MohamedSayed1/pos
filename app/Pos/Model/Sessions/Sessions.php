<?php


namespace App\Pos\Model\Sessions;


use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{

    protected $table      = "session";
    protected $primaryKey = "session_id";

    public function getUserOpen()
    {
        return $this->belongsTo('App\User','user_id_open','id');
    }
    public function getUserClose()
    {
        return $this->belongsTo('App\User','user_id_close','id');
    }
}