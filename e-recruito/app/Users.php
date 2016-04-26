<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

	protected $table = 'users';
	protected $fillable = ['username','name','password','foto','email','role','religion','profesi','motto'];
}
