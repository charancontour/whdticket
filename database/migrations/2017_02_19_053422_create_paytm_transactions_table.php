<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaytmTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paytm_transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('MID');
			$table->string('ORDERID');
			$table->double('TXNAMOUNT');
			$table->string('BANKTXNID');
			$table->string('STATUS');
			$table->string('RESPCODE');
			$table->string('RESPMSG');
			$table->string('GATEWAYNAME');
			$table->string('BANKNAME');
			$table->string('PAYMENTMODE');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('paytm_transactions');
	}

}
