<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'tbhRegPatient';

    //mendeklarasikan nama field yang dijadikan primary key pada tabel
    protected $primaryKey = 'patNRM';

    //mendeklarasikan type dari field yang dijadikan primary key
    protected $keyType = 'varchar';

    public $incrementing = 'false';

    protected $fillable = [
        'patNRM', 'patidCardNo', 'patRegDate', 'patSurename', 'patGivenname',
        'patDOB', 'patSex', 'patAddres', 'patPhone', 'patEmail',
        'nationality_nationID', 'user_id',
    ];

    public function rapid()
    {
        return $this->hasMany(Rapid::class);
    }

    public function swabtest()
    {
        return $this->hasMany(Swabtest::class);
    }

    public function antigen()
    {
        return $this->hasMany(Antigen::class);
    }

    public function serology()
    {
        return $this->hasMany(Serology::class);
    }
}
