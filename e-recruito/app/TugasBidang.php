<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasBidang extends Model {

	protected $table = 'tugas-bidang';
	protected $fillable = ['idoprec','idbidang','deskripsi'];
}
