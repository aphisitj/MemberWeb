<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class PlaceVoucher extends Model
{

    // use SoftDeletes;
    public $table = 'place_voucher';
    public $primaryKey = 'place_voucher_id';
    public $fillable = ['place_voucher_id','place_id','voucher_name','price','status','expire_days',
                            'expire_date','quota','fee_percent','fee_amount','status'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

}
