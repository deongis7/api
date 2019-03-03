<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jaminan;

class ControllerJaminan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jaminan::all();

		if(count($data) > 0){ //mengecek apakah data kosong atau tidak
			$res['message'] = "Success!";
			$res['values'] = $data;
			return response($res);
		}
		else{
			$res['message'] = "Empty!";
			return response($res);
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$nama = $request->input('nama');
		$email = $request->input('email');
		$nohp = $request->input('nohp');
		$alamat = $request->input('alamat');

		$data = new Jaminan();
		$data->nama = $nama;
		$data->email = $email;
		$data->nohp = $nohp;
		$data->alamat = $alamat;

		if($data->save()){
			$res['message'] = "Success!";
			$res['value'] = "$data";
			return response($res);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jaminan::where('id',$id)->get();

		if(count($data) > 0){ //mengecek apakah data kosong atau tidak
			$res['message'] = "Success!";
			$res['values'] = $data;
			return response($res);
		}
		else{
			$res['message'] = "Failed!";
			return response($res);
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
