<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VarrivalICD extends Model
{
    protected $table = 'vArrivalListwithICD';

    protected $primaryKey = 'patNRM';

    protected $keyType = 'varchar';

    public $incrementing = 'false';
}
