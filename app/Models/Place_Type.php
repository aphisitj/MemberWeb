<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Place_Type extends Model
{

    // use SoftDeletes;
    public $table = 'place_type';
    public $primaryKey = 'place_type_id';
    public $fillable = ['place_type_id','place_type_name_th','place_type_name_en'];

    // public $fillable = ['place_id','place_name','address','status','img',
    //                         'facility','service','type','fee_percent','email','phone','password','username'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

    public function place_type()
    {
        return $this->belongsToMany('App\Models\Place_Type');
    }

}
