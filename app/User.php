<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model
{
    protected  $fillable=['username', 'password'];
    use SoftDeletes;

}
