<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  mail_id
 */
class MailDocument extends Model
{
    //
    protected $table = 'mails_documents';

    public  $primaryKey = 'id';

    public $timestamps = true;

    public function mail()
    {
        return $this->belongsTo('App\Mail');
    }
}
