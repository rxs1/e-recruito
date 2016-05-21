<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bidang;
use App\Oprec;
use App\Instansi;
use App\TugasBidang;
use App\TugasUmum;
use DB;
use Illuminate\Http\Request;
use App\PendaftarBidang;
use Input, Redirect, File, Session,Validator, Response;

class TugasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	/*
	*Untuk mendapatkan tugas masing2 user
	*/
	public function userTask($idinstansi,$idoprec)
	{
		

		if(session()->get('isLogin')) {
			$user = session()->get('isLogin');	
			$oprec = Oprec::where('id',$idoprec)->first();
			$instansi=Instansi::where('id',$idinstansi)->first();
			$tugasUmum = TugasUmum::where('idoprec',$idoprec)->first();
			$tugasBidang = DB::table('tugas-bidang')
			->join('pendaftar-bidang', function($join)
			{
				$join->on('tugas-bidang.id', '=', 'pendaftar-bidang.idbidang');
			})->join('bidang',function($join)
			{
				$join->on('bidang.id', '=', 'pendaftar-bidang.idbidang');
			}) 
			->where('iduser',$user->id)->get();

			$title = 'Upload Document Task '.$oprec->name; 

			return view('user.registered-oprec.field.tugas.viewalltugas',['title'=>$title,'oprec'=>$oprec,'instansi'=>$instansi,'idoprec'=>$idoprec,'idinstansi'=>$idinstansi,'tugasUmum'=>$tugasUmum,'tugasBidang'=>$tugasBidang]);

		} else {
			return redirect('/');
		}
	}

}
