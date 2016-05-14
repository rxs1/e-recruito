<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PendaftarBidang extends Model {

	protected $table = 'pendaftar-bidang';
	protected $fillable = ['iduser','idbidang','idoprec','status','idwawancara'];

}
