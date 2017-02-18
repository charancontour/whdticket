<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('registration_id')->unsigned();
			$table->integer('payment_method_id')->unsigned();
			$table->string('token');
			$table->double('amount');
			$table->double('response_amount');
			$table->integer('response');
			$table->string('response_message');
			$table->string('response_card_token');
			$table->string('response_transaction_id');
			$table->string('response_cvv');
			$table->string('response_avs');
			$table->date('response_date');
			$table->time('response_time');
			$table->string('response_cardholder_name');
			$table->string('response_card_number');
			$table->string('response_expiry_date');
			$table->string('response_card_type');
			$table->string('response_approval_code');
			$table->boolean('response_dirty_flag');
			$table->timestamps();
			$table->foreign('registration_id')->references('id')->on('registrations');
			$table->foreign('payment_method_id')->references('id')->on('payment_methods');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}
