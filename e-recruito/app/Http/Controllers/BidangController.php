<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bidang;
use App\Instansi;
use App\PendaftarBidang;
use App\Oprec;
use Illuminate\Http\Request;
use Input, Redirect, File, Session,Validator, Response;	
class BidangController extends Controller {

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
	public function create($idinstansi,$idoprec)
	{
		if(session()->get('isLogin')){
			$title = 'Create Field';
			return view('user.instansi.oprec.field.create',['title'=>$title,'idinstansi'=>$idinstansi,'idoprec'=>$idoprec]); 
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		if(session()->get('isLogin')){
			$user = session()->get('isLogin');
			$input = Input::all();
			$rules = array(
				'name' =>'required', 
				'deskripsi' =>'required', 
				'cp' =>'required', 
				);
			
			$validator = Validator::make($input,$rules);
			if($validator->fails()){
				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/oprec/'.$input['idoprec'].'/make/field')->withInput()->withErrors($validator->errors());
			}else{

				
				$bidang = Bidang::create([
					'idoprec'=>$input['idoprec'],
					'name'=>$input['name'],
					'deskripsi'=>$input['deskripsi'],
					'cp'=>$input['cp'],
					]);

				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/oprec/'.$input['idoprec'].'/allfield')->with('message','1');
			}

		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
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

	}

	public function viewAllField($idinstansi,$idoprec)
	{
		if(session()->get('isLogin')){
			$allField = Bidang::where('idoprec',$idoprec)->get();
			return view('user.instansi.oprec.field.viewallfield',['title'=>'All Field','allField'=>$allField,'idinstansi'=>$idinstansi,'idoprec'=>$idoprec ]);
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}

	public function registrantField($idinstansi,$idoprec)
	{
		if(session()->get('isLogin')){
			$allField = Bidang::where('idoprec',$idoprec)->get();
			return view('user.instansi.oprec.field.registrant.registrantfield',['title'=>'All Field And Registrant','allField'=>$allField,'idinstansi'=>$idinstansi,'idoprec'=>$idoprec ]);
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}
	
	public function viewAllRegistrant($idinstansi,$idoprec,$idfield)
	{
		if(session()->get('isLogin')){
			$instansi = Instansi::where('id',$idinstansi)->first();
			$oprec = Oprec::where('id',$idoprec)->first();
			$bidang = Bidang::where('id',$idfield)->first();
			$pendaftarBidang = PendaftarBidang::where('idbidang',$idfield)->get();
			return view('user.instansi.oprec.field.registrant.allregistrant',['title'=>'Registrant :'.$instansi->name.'>'.$oprec->name.'>'.$bidang->name,'bidang'=>$bidang,'idinstansi'=>$idinstansi,'idoprec'=>$idoprec,'pendaftarBidang'=>$pendaftarBidang ]);
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}


	


}
