<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JsonLog extends Model
{
    //

    protected $table = 'json_logs';

    public  $primaryKey = 'id';

    public $timestamps = true;

}
