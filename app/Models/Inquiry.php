<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Inquiry extends Model
{

    // use SoftDeletes;
    public $table = 'inquiry';
    public $primaryKey = 'inquiry_id';
    public $fillable = ['inquiry_id','note','arrival_date','departure_date','order_voucher_id'];

    // public $fillable = ['place_id','place_name','address','status','img',
    //                         'facility','service','type','fee_percent','email','phone','password','username'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

    public function inquiry()
    {
        return $this->belongsToMany('App\Models\Inquiry');
    }

}
