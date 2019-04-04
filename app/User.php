<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    public function shortName(){
        $nn = explode(' ', $this->fio);
        return $nn[0]." ".mb_substr($nn[1], 0, 1).".".mb_substr($nn[2], 0, 1).".";
    }

    public function issues(){
        return $this->hasMany(Issue::class);
    }
}
