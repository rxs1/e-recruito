<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model {

	protected $table = 'bidang';
	protected $fillable = ['idoprec','name','cp','deskripsi','deadline'];

}
