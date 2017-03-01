<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Orders extends Model
{

    // use SoftDeletes;
    public $table = 'orders';
    public $primaryKey = 'order_id';
    public $fillable = ['order_id','date','price_total','fee_total','user_id'];

    // public $fillable = ['place_id','place_name','address','status','img',
    //                         'facility','service','type','fee_percent','email','phone','password','username'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Orders');
    }

}
