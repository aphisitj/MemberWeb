<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Place_Picture extends Model
{

    // use SoftDeletes;
    public $table = 'place_picture';
    public $primaryKey = 'place_picture_id';
    public $fillable = ['place_id','place_picture_id','src'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

}