<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'auths';
    protected $guarded = [];
    public $timestamps = false;

    public function acc()
    {
        return $this->belongsTo('App\Models\Account', 'acc_id', 'id');
    }
}
