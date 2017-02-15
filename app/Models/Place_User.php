<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Place_User extends Model
{

    // use SoftDeletes;
    public $table = 'place_user';
    public $primaryKey = 'place_user_id';
    public $fillable = ['place_user_id','place_id','user_id'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

}
