<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable  = array('idcard','name','money','yongtu','laiyuan','teshu','qingkuang','openid','project');
    protected $table='partner';
}
