<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

	protected $table = 'users';
	protected $fillable = ['name','password','foto','email','role','region','profesi','motto','birthdate'];
	
}
