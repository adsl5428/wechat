<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/7/21
 * Time: 11:50
 */

namespace App\Billing;


use App\Http\Requests\Request;

class PingBilling implements BillingInterface
{
    public function __construct()
    {
        \Pingpp\Pingpp::setApiKey(env('PING_API_KEY'));
    }

    public function charge(array $data)
    {
        $charge = \Pingpp\Charge::create([
            'order_no'=>time().rand(1000,99999),
            'amount'=>$data['fee'],
            'app'=>['id'=>env('PING_APP_ID')],
            'channel'=>$data['channel'],
            'currency' => 'cny',
            'client_ip'=>\Request::ip(),
            'subject' => 


        ])  ;
    }
    protected function makeExtra($channel)
    {
        $extra=[];
        switch ($channel){
            case 'alipay_pc_direct':
                $extra['success_url'] = '';
                break;
            case 'wx_pub_qr';
                $extra['product_id'] = $this->makeOrder();
                break;
        }
        return $extra;
    }
    protected function makeOrder()
    {
        return time().mt_rand(100,9999);
    }
}