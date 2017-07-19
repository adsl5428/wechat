<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable  = ['idcard','name','money','yongtu','laiyuan','teshu','qingkuang','openid','project'];

    public function pictures()
    {
        return $this->hasMany('App\Http\Model\Picture','order_id','id');
    }
}
