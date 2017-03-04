<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Order_package extends Model
{

    // use SoftDeletes;
    public $table = 'order_package';
    public $primaryKey = 'order_package_id';
    public $fillable = ['order_package_id','order_id','price','quantity','package_id','status'];

    // public $fillable = ['place_id','place_name','address','status','img',
    //                         'facility','service','type','fee_percent','email','phone','password','username'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

    public function order_package()
    {
        return $this->belongsToMany('App\Models\Order_package');
    }

}
