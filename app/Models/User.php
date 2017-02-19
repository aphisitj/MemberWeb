<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
 //    protected $table = 'user';
 //    public $timestamps = true;
	// public $primaryKey = 'user_id';
 //    protected $hidden = ['password'];
 //    protected $dates = ['deleted_at'];
    public $table = 'user';
    public $primaryKey = 'user_id';
    public $fillable = ['firstname','lastname','email','password','mobile','type','verify_email','verification'];
    protected $guarded = [];
    public $timestamps = true;

    public function place()
    {
        return $this->belongsToMany('App\Models\Place');
    }

}
