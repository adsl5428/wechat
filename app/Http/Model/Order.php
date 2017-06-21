<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable  = array('idcard','name','money','yongtu','laiyuan','teshu','qingkuang','openid','project');

    public function pictures()
    {
        return $this->hasMany('App\Http\Model\Picture','order_id','id');
    }
}
