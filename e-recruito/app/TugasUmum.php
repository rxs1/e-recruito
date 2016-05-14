<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasUmum extends Model {

	protected $table = 'tugas-umum';
	protected $fillable = ['idoprec','deskripsi'];

}
