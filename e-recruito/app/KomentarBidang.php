<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarBidang extends Model {

	protected $table = 'komentar-bidang';
	protected $fillable = ['iduser','idoprec','komentar'];

}
