<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property int|null user_id
 */
class MailDocumentTemp extends Model
{
    //
    protected $table = 'mails_documents_temp';
}
