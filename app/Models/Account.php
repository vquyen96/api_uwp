<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    protected $guarded = [];

    public function auth(){
        return $this->hasMany('App\Models\Auth', 'acc_id', 'id');
    }
}
