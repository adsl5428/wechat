<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable  = ['order_id','path','type'];
}
