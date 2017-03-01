<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Package extends Model
{

    // use SoftDeletes;
    public $table = 'package';
    public $primaryKey = 'package_id';
    public $fillable = ['package_id','package_name','detail','price','fee','expire_type','expire_day','expire_date',
                            'public','quota','place_id'];

    // public $fillable = ['place_id','place_name','address','status','img',
    //                         'facility','service','type','fee_percent','email','phone','password','username'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

    public function package()
    {
        return $this->belongsToMany('App\Models\Package');
    }

}
