<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable  = array('order_id','path','type');
}
