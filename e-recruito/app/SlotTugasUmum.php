<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotTugasUmum extends Model {

	protected $table = 'slot-tugas-umum';
	protected $fillable = ['iduser','link_tugas','idoprec'];

}
