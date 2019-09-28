<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    //
    protected $table = 'mails';

    public $primaryKey = 'id';

//    public static $snakeAttributes = false;

    public $timestamps = true;

    public function details()
    {
        return $this->hasMany('App\MailDetail', 'mail_id','id');
    }

    public function documents()
    {
        return $this->hasMany('App\MailDocument', 'mail_id', 'id');
    }

    public function sender()
    {
        return $this->hasMany('App\Sender', 'mail_id', 'id');
    }

}
