<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Place_User extends Model
{

    // use SoftDeletes;
    public $table = 'user_place';
    public $primaryKey = 'user_place_id';
    public $fillable = ['user_place_id','place_id','user_id'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

}
