<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotTugas extends Model {

	protected $table = 'slot-tugas';
	protected $fillable = ['iduser','idtugas','tugas'];

}
