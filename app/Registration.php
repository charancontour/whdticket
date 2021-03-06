<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model {

	protected $fillable = ['number_of_tickets','amount','ticket_id','name','address','phonenumber','state','country','city','zipcode','organization','email','designation'];

	public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    public function paytm()
    {
        return $this->hasOne('App\PaytmTransaction','ORDERID');
    }  

    public function payumoney()
    {
    	return $this->hasOne('App\PayumoneyTransaction','registration_id');
    }  

}
