<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bidang;
use App\Oprec;
use App\Instansi;
use App\SlotTugasBidang;
use App\TugasBidang;
use App\SlotTugasUmum;
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

	public function uploadUserTask() {
		if (session()->get('isLogin')) {
			$user = session()->get('isLogin');
			$input = Input::all();

			$tugasBidang = DB::table('tugas-bidang')
			->join('pendaftar-bidang', function($join)
			{
				$join->on('tugas-bidang.id', '=', 'pendaftar-bidang.idbidang');
			})->join('bidang',function($join)
			{
				$join->on('bidang.id', '=', 'pendaftar-bidang.idbidang');
			}) 
			->where('iduser',$user->id)->get();

			$str = '';
			foreach($tugasBidang as $tgs) {
				$idbidang = $tgs->idbidang;
				if ($str == '') {
					$str = $str.$idbidang;
				} else {
					$str = $str.','.$idbidang;
				}
			}

			$rules = array('common' => 'required_without_all:'.$str.'|mimes:zip,rar');

			foreach ($tugasBidang as $tgs) {
				$idbidang = $tgs->idbidang;
				$sentenceRule = 'common';
				foreach ($tugasBidang as $t) {
					$idbid = $t->idbidang;
					if ($idbidang != $idbid) {
						$sentenceRule = $sentenceRule.','.$idbid;
					}
				}
				$rules[$idbidang] = 'required_without_all:'.$sentenceRule.'|mimes:zip,rar';
			}

			$message = ['required_without_all' => 'At least one field is required', 'mimes' => 'The document should be zip/rar'];
			$validator = Validator::make($input,$rules,$message);
			if($validator->fails()) {
				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/oprec/'.$input['idoprec'].'/yourTask')->withErrors($validator->errors())->with('uploaded','0');
			} else {
				if(isset($input['common'])) {
					$tugasUmum = Input::file('common');

					$old = SlotTugasUmum::where('idoprec',$input['idoprec'])->where('iduser',$user->id)->first();
					if ($old) {
						File::delete('file-server/slot-tugas-umum/'.$old->link_tugas);
					}
					$filename = rand(1111,9999).time().'.'.$tugasUmum->getClientOriginalExtension();
					Input::file('common')->move('file-server/slot-tugas-umum/',$filename);

					if ($old) {
						$old->link_tugas = $filename;
						$old->save();
					} else {
						$slotTugasUmum = SlotTugasUmum::create([
							'idoprec' => $input['idoprec'],
							'iduser' => $user->id,
							'link_tugas' => $filename
						]);
					}
				}

				foreach($tugasBidang as $tgs) {
					$idbdg = $tgs->idbidang;
					if (isset($input[$idbdg])) {
						$tugasBdg = Input::file($idbdg);

						$old = SlotTugasBidang::where('idoprec',$input['idoprec'])->where('iduser',$user->id)->where('idbidang',$idbdg)->first();
						if ($old) {
							File::delete('file-server/slot-tugas-bidang/'.$old->link_tugas);
						}
						$filename = rand(1111,9999).time().'.'.$tugasBdg->getClientOriginalExtension();
						Input::file($idbdg)->move('file-server/slot-tugas-bidang/',$filename);

						if ($old) {
							$old->link_tugas = $filename;
							$old->save();
						} else {
							$slotTugasBidang = SlotTugasBidang::create([
								'idoprec' => $input['idoprec'],
								'iduser' => $user->id,
								'link_tugas' => $filename,
								'idbidang' => $idbdg
							]);
						}
					}
				}

				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/oprec/'.$input['idoprec'].'/yourTask')->with('uploaded','1');
			}

		} else {
			return redirect('/');
		}
	}
}
