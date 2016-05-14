<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotWawancara extends Model {

	
	protected $table = 'slot-wawancara';
	protected $fillable = ['iduser','idbidang','idoprec','date'];

}
