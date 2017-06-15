<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable  = array('idcard','name','money','yongtu','laiyuan','teshu');
}
