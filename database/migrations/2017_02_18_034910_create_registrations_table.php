<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ticket_id')->unsigned();
			$table->double('amount');
			$table->string('name');
			$table->string('organization');
			$table->string('designation');
			$table->text('address');
			$table->string('city');
			$table->string('state');
			$table->string('zipcode');
			$table->string('country');
			$table->string('phonenumber');
			$table->string('email');
			$table->boolean('paid_flag');
			$table->timestamps();
			$table->foreign('ticket_id')->references('id')->on('tickets');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registrations');
	}

}
