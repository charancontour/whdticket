<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model {

	protected $fillable = ['ticket_id','name','address','phonenumber','state','country','city','zipcode','organization','email','designation'];

	public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

}
