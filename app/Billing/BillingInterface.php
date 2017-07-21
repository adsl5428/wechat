<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/7/21
 * Time: 11:42
 */

namespace App\Billing;


interface BillingInterface
{
    public function charge(array $data);
}