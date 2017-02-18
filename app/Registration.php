<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model {

	protected $fillable = ['name','address','phonenumber','state','country','city','zipcode','organization','email','designation'];

}
