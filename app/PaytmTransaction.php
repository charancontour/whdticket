<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PaytmTransaction extends Model {

	//

	protected $fillable = ['MID','ORDERID','TXNAMOUNT','BANKTXNID','STATUS','RESPCODE','RESPMSG','GATEWAYNAME','BANKNAME','PAYMENTMODE'];

}
