<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model {
	protected $table = 'instansi';
	protected $fillable = ['iduser','name','email','foto','deskripsi','fileproveinstansi','status'];
}
