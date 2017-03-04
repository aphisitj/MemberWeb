<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Orders_voucher extends Model
{

    // use SoftDeletes;
    public $table = 'orders_voucher';
    public $primaryKey = 'orders_voucher_id';
    public $fillable = ['orders_voucher_id','orders_package_id','voucher_id','used','max','status'];

    // public $fillable = ['place_id','place_name','address','status','img',
    //                         'facility','service','type','fee_percent','email','phone','password','username'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

    public function orders_voucher()
    {
        return $this->belongsToMany('App\Models\Orders_voucher');
    }

}
