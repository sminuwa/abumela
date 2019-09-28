<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    //

    protected $table = 'senders';

    public  $primaryKey = 'id';

    public $timestamps = true;

    public function mail()
    {
        return $this->belongsTo('App\Mail');
    }

    public function details(){
        return $this->belongsTo('App\MailDetails');
    }
}
