<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailDetail extends Model
{
    //
    protected $table = 'mails_details';

    public $primaryKey = 'id';

//    public static $snakeAttributes = false;

    public $timestamps = true;

    public function mail()
    {
        return $this->belongsTo('App\Mail', '');
    }

    public function sender(){
        return $this->hasOne('App\Sender', 'sender_id');
    }
}
