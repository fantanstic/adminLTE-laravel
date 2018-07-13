<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TotalInfo extends Model
{
    protected $fillable = [
        'date', 'dayActive', 'newUser', 'publishTaskCount',
        'completeTaskCount', 'videoCoinCount', 'paidUser',
        'newPaidUser', 'newPaidCount', 'payRate', 'dailyGains',
        'arpu', 'payCount', 'arppu', 'loginCount', 'loginCountAvg',
        'version','payPal','strip','vip_try'
    ];

    /**
     * 获取paypal和信用卡stripe的收入
     */
    public static function getPaypalStrip()
    {
        $paypal_stripe=DB::connection('origin_mysql')
            ->table('zeai_paypal_strip')
            ->where('status',2)
            ->get()
            ->toArray();
        $all_arr=[];
        foreach ($paypal_stripe as $k=>$value){
            $date=date('Y-m-d',strtotime($value->create_at));
            $all_arr[$date]= !isset($all_arr[$date]['payPal']) || !isset($all_arr[$date]['strip']) ? ['payPal'=>0,'strip'=>0] : $all_arr[$date];
            //paypal
            if($value->pay_type==2){
                $all_arr[$date]['payPal']+=$value->money;
            }else{
            //信用卡
                $all_arr[$date]['strip']+=$value->money;
            }
        }
        return $all_arr;
    }
}
