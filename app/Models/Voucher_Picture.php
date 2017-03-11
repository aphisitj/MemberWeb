<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;



class Voucher_Picture extends Model
{

    // use SoftDeletes;
    public $table = 'voucher_picture';
    public $primaryKey = 'voucher_picture_id';
    public $fillable = ['voucher_id','voucher_picture_id','src'];
    protected $guarded = [];
    public $timestamps = true;
    // protected $dates = ['deleted_at'];

}