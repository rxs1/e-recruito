<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model {
	protected $table = 'instansi';
	protected $fillable = ['iduser','email','foto','deskripsi','fileproveinstansi',];
}
