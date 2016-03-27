<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Susu extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'relawan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['IDRELAWAN', 'NAMA_RELAWAN', 'ALAMAT', 'KTP', 'TEMPATLAHIR', 'TANGGALLAHIR', 'JENISKELAMIN', 'DOMISILI', 'PEKERJAAN', 'PENDIDIKAN', 'IPK', 'NOHP', 'EMAIL', 'TWITTER', 'FACEBOOK', 'PERTANYAAN1', 'PERTANYAAN2', 'PERTANYAAN3', 'PERTANYAAN4', 'PERTANYAAN5', 'PERTANYAAN6', 'BERKAS1', 'BERKAS2', 'BERKAS3', 'KOMITMEN', 'BIDANG1', 'BIDANG2', 'PASS'];


}
