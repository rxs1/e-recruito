<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotTugasBidang extends Model {

	protected $table = 'slot-tugas-bidang';
	protected $fillable = ['idbidang','idoprec','link-tugas','idtugasbidang'];

}
