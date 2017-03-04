<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Voucher extends Authenticatable
{
 //    protected $table = 'user';
 //    public $timestamps = true;
	// public $primaryKey = 'user_id';
 //    protected $hidden = ['password'];
 //    protected $dates = ['deleted_at'];
    public $table = 'voucher';
    public $primaryKey = 'voucher_id';
    public $fillable = ['voucher_id','voucher_name','detail_short','description','allot','inquiry_flag','package_id'];
    protected $guarded = [];
    public $timestamps = true;

    public function voucher()
    {
        return $this->belongsToMany('App\Models\Voucher');
    }

}
