<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PayumoneyTransaction extends Model {

	protected $table = 'payumoney_transactions';

	protected $fillable = ['registration_id','mihpayid','mode','status','unmappedstatus','key','txnid',
							'amount','addedon','productinfo','PG_TYPE','encryptedPaymentId','bank_ref_num',
							'bankcode','error','error_Message','name_on_card','cardnum','cardhash',
							'amount_split','payuMoneyId','discount','net_amount_debit','json_description'
						  ];

	public function registration(){
		return $this->belongsTo('App\Registration');
	}

}
