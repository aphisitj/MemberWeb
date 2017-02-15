<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Place extends Model
{

    // use SoftDeletes;
    public $table = 'place';
    public $primaryKey = 'place_id';
    public $fillable = ['place_id','place_name','address','status','img',
                            'facility','service','type','fee_percent'];

    // public $fillable = ['place_id','place_name','address','status','img',
    //                         'facility','service','type','fee_percent','email','phone','password','username'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

    public function place()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
