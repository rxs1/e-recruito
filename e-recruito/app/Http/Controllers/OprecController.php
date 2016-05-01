<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Instansi;
use App\Oprec;
use App\Bidang;
use Input, Redirect, File, Session,Validator, Response;	
class OprecController extends Controller {

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
	public function create($idinstansi)
	{
		if(session()->get('isLogin')){
			$title = 'Create Oprec';
			return view('user.instansi.oprec.create',['title'=>$title,'idinstansi'=>$idinstansi]); 
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
			$input = Input::all();
			$input['statuspublis'] = 0;
			$rules = [
			'name' => 'required',
			'max-field-person' => 'required',
			'idinstansi' => 'exists:instansi,id'
			];

			$validator = Validator::make($input,$rules);
			if($validator->fails()){
				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/make/oprec')->withInput()->withErrors($validator->errors());
			}else{
				Oprec::create([
					'name'=>$input['name'],
					'brosur'=>'default.jpg',
					'max-field-person'=>$input['max-field-person'],
					'idinstansi'=>$input['idinstansi'],
					]);
				$instansi = Instansi::find($input['idinstansi']);
				$title ='All Oprec '.$instansi->name;
				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/alloprec')->withInput();
				//return view('user.instansi.oprec.viewalloprec',['title'=>$title]);
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
		if(session()->get('isLogin')){
			$oprec = Oprec::find($id);
			$instansi = Instansi::find($oprec->idinstansi);
			$field = Bidang::where('idoprec',$id)->get();
			$title = $oprec->name ;
			return view('user.instansi.oprec.show',['title'=>$title,'oprec'=>$oprec,'instansi'=>$instansi,'field'=>$field]); 
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		if(session()->get('isLogin')){
			$oprec = Oprec::find($id);
			$instansi = Instansi::find($oprec->idinstansi);
			$title = 'Edit '. $oprec->name ;
			return view('user.instansi.oprec.edit',['title'=>$title,'oprec'=>$oprec]); 
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateOprec()
	{
		if(session()->get('isLogin')){
			$input =Input::all();
			$oprec = Oprec::find($input['id']);
			if($input['date'] != ''){
				$oprec->deadline=$input['date'];
			}
			$image = Input::file('brosur');
			if(isset($input['brosur'])){
				if($oprec->brosur != 'default.jpg'){
					File::delete('public/assets/img/brosur-oprec/'.$oprec->brosur);
				}					
				$filename  = rand(1111,9999).time() . '.' . $image->getClientOriginalExtension();
				Input::file('brosur')->move('public/assets/img/brosur-oprec/',$filename);
				$oprec->brosur = $filename;
			}

			$oprec->save();
			return Redirect::to('/pengguna/instansi/'.$oprec->idinstansi.'/alloprec')->with('message','Edited');
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
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
	public function unpublish($idinstansi,$idoprec){

		
		if(session()->get('isLogin')){

			$instansi = Instansi::find($idinstansi);
			$oprec = Oprec::find($idoprec);
			$oprec->statuspublis = 0;
			$oprec->save();
			$title ='All Oprec '.$instansi->name;
			return Redirect::to('/pengguna/instansi/'.$idinstansi.'/alloprec')->with('message', 'Change to Not Published');


		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}

	}

	public function publish(){
		$input = Input::all();

		$rules = [
		'date' => 'required|after:yesterday',
		'brosur' => 'required|mimes:jpeg,jpg,png',
		];
		$instansi = Instansi::find($input['idinstansi']);
		$oprec = Oprec::find($input['idoprec']);
		$validator = Validator::make($input,$rules);
		if(session()->get('isLogin')){
			if($validator->fails()){
				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/alloprec')->with('message',$oprec->name)->withErrors($validator->errors());
			}else{
				$oprec->deadline=$input['date'];
				$oprec->statuspublis=1;
				$image = Input::file('brosur');
				if(isset($input['brosur'])){
					if($oprec->brosur != 'default.jpg'){
						File::delete('public/assets/img/brosur-oprec/'.$oprec->brosur);
					}					
					$filename  = rand(1111,9999).time() . '.' . $image->getClientOriginalExtension();
					Input::file('brosur')->move('public/assets/img/brosur-oprec/',$filename);
					$oprec->brosur = $filename;
				}

				$oprec->save();
				$title ='All Oprec '.$instansi->name;
				return Redirect::to('/pengguna/instansi/'.$input['idinstansi'].'/alloprec')->with('message', 'Published');

			}
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}

	}
	public function viewAllOprec($idinstansi)
	{
		if(session()->get('isLogin')){
			$allOprec = Oprec::where('idinstansi',$idinstansi)->get();
			return view('user.instansi.oprec.viewalloprec',['title'=>'All Oprec','allOprec'=>$allOprec,'idinstansi'=>$idinstansi]);
		}else{
			$title='E-recruito Login';
			return Redirect::to('/login')->with('title',$title);
		}
	}

}
