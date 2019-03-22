<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JaminanStoreRequest;
use App\Http\Requests\ValidityStoreRequest;
use App\Jaminan;
use Carbon\Carbon;
use Validator;

class ControllerJaminanJSON extends Controller
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
			$res['code'] = "200";
			$res['status'] = "success";
			$res['data'] = $data;
			return response($res,200);
		}
		else{
			$res['code'] = "404";
			$res['status'] = "error";
			$res['error'] = "Not Found";
			$res['message'] = "Data tidak Ada";
			$res['data'] = null;
			return response($res,404);
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
    public function store(JaminanStoreRequest $request)
    {

		$tgl_kirim = $request->input('tgl_kirim');
		$bank_penerbit = $request->input('bank_penerbit');
		$alamat_bank_penerbit = $request->input('alamat_bank_penerbit');
		$nomor_jaminan = $request->input('nomor_jaminan');
		$nomor_ref = $request->input('nomor_ref');
		$jenis_jaminan = $request->input('jenis_jaminan');
		$jenis_produk = $request->input('jenis_produk');
		$beneficary = $request->input('beneficary');
		$unit_pengguna = $request->input('unit_pengguna');
		$applicant = $request->input('applicant');
		$no_kontrak = $request->input('no_kontrak');
		$uraian_pekerjaan = $request->input('uraian_pekerjaan');
        $currency = $request->input('currency');
		$nilai_jaminan = $request->input('nilai_jaminan');
		$tgl_terbit = $request->input('tgl_terbit');
		$tgl_berlaku = $request->input('tgl_berlaku');
		$tgl_berakhir = $request->input('tgl_berakhir');
		$tgl_claim = $request->input('tgl_claim');
		$nama_file_jaminan = ($request->input('nama_file_jaminan'));
        $nama_user = $request->input('nama_user');
        $email = $request->input('email');

		//dd(base64_decode($request->input('nama_file_jaminan')));
		$data = Jaminan::where('nomor_jaminan', $nomor_jaminan)->first();
		if(count($data) > 0){
			$data->tgl_kirim= $tgl_kirim;
			$data->bank_penerbit = $bank_penerbit;
			$data->alamat_bank_penerbit = $alamat_bank_penerbit;
			$data->nomor_ref = $nomor_ref;
			$data->jenis_jaminan =$jenis_jaminan;
			$data->jenis_produk = $jenis_produk;
			$data->beneficary = $beneficary;
			$data->unit_pengguna = $unit_pengguna;
			$data->applicant = $applicant;
			$data->no_kontrak = $no_kontrak;
			$data->uraian_pekerjaan =$uraian_pekerjaan;
			$data->currency = $currency;
			$data->nilai_jaminan = $nilai_jaminan;
			$data->tgl_terbit = $tgl_terbit;
			$data->tgl_berlaku =$tgl_berlaku;
			$data->tgl_berakhir = $tgl_berakhir;
			$data->tgl_claim =$tgl_claim;
			$data->nama_file_jaminan = $nama_file_jaminan;
			$data->nama_user = $nama_user;
			$data->email = $email;
			if ($request->nama_file_jaminan != null) {
				$timestamp = str_replace([' ', ':'], '', Carbon::now()->toDateTimeString());
				$image = str_replace('data:application/pdf;base64,', '', $nama_file_jaminan); 	 
				$nama_file_jaminan = $timestamp . '-'.str_random(10).'.'.'pdf';
				\File::put(storage_path(). '/upload/jaminan/' . $nama_file_jaminan, base64_decode($image));

				$data->nama_file_jaminan = $nama_file_jaminan;
			}
			if($data->update()){
				$res['code'] = "200";
				$res['status'] = "success";
				$res['message'] = "Data berhasil di Update";
				$res['data'] = $data;
				return response($res,200);	
			} else {
				 return response()->json([
					'code' => '500',
					'status' => 'error',
					'error' => 'Internal Server Error',
					'message' => 'Tidak dapat Diproses',
				],500);
			}
			
		}	else {
			$data = new Jaminan();
			$data->tgl_kirim= $tgl_kirim;
			$data->bank_penerbit = $bank_penerbit;
			$data->alamat_bank_penerbit = $alamat_bank_penerbit;
			$data->nomor_jaminan =$nomor_jaminan;
			$data->nomor_ref = $nomor_ref;
			$data->jenis_jaminan =$jenis_jaminan;
			$data->jenis_produk = $jenis_produk;
			$data->beneficary = $beneficary;
			$data->unit_pengguna = $unit_pengguna;
			$data->applicant = $applicant;
			$data->no_kontrak = $no_kontrak;
			$data->uraian_pekerjaan =$uraian_pekerjaan;
			$data->currency = $currency;
			$data->nilai_jaminan = $nilai_jaminan;
			$data->tgl_terbit = $tgl_terbit;
			$data->tgl_berlaku =$tgl_berlaku;
			$data->tgl_berakhir = $tgl_berakhir;
			$data->tgl_claim =$tgl_claim;
			$data->nama_file_jaminan = $nama_file_jaminan;
			$data->nama_user = $nama_user;
			$data->email = $email;
			
			if ($request->nama_file_jaminan != null) {
				$timestamp = str_replace([' ', ':'], '', Carbon::now()->toDateTimeString());
				$image = str_replace('data:application/pdf;base64,', '', $nama_file_jaminan); 	 
				$nama_file_jaminan = $timestamp . '-'.str_random(10).'.'.'pdf';
				\File::put(storage_path(). '/upload/jaminan/' . $nama_file_jaminan, base64_decode($image));
				
				$data->nama_file_jaminan = $nama_file_jaminan;
			}
			$data->status = '0';			
			if($data->save()){
				$res['code'] = "201";
				$res['status'] = "created";
				$res['message'] = "Data berhasil di Simpan";
				$res['data'] = $data;
				return response($res,201);	
			} else {
				 return response()->json([
					'code' => '500',
					'status' => 'error',
					'error' => 'Internal Server Error',
					'message' => 'Tidak dapat Diproses',
				],500);
			}		
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
			$res['code'] = "200";
			$res['status'] = "success";
			$res['data'] = $data;
			return response($res,200);
		}
		else{
			$res['code'] = "404";
			$res['status'] = "error";
			$res['error'] = "Not Found";
			$res['message'] = "Data tidak Ada";
			$res['data'] = null;
			return response($res,404);
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
    public function update(ValidityStoreRequest $request)
    {
        //
		$no_validity = $request->input('no_validity');
		$penanda_tangan = $request->input('penanda_tangan');
		$jabatan_penanda_tangan = $request->input('jabatan_penanda_tangan');
		$nomor_jaminan = $request->input('nomor_jaminan');
		$tgl_konfirmasi = $request->input('tgl_konfirmasi');
		$nama_file_validity = base64_decode($request->input('nama_file_validity'));
		

		$data = new Jaminan();
		$data = Jaminan::where('nomor_jaminan', $nomor_jaminan )->first();
		if(count($data) > 0)
		{
			$data->no_validity= $no_validity;
			$data->penanda_tangan = $penanda_tangan;
			$data->jabatan_penanda_tangan = $jabatan_penanda_tangan;
			$data->tgl_konfirmasi =$tgl_konfirmasi;
			$data->nama_file_validity = $nama_file_validity;
			
			 if ($request->nama_file_validity != null) {
				$timestamp = str_replace([' ', ':'], '', Carbon::now()->toDateTimeString());
				$image = str_replace('data:application/pdf;base64,', '', $nama_file_validity); 	 
				$nama_file_validity = $timestamp . '-'.str_random(10).'.'.'pdf';
				\File::put(storage_path(). '/upload/jaminan/' . $nama_file_validity, base64_decode($image));

				$data->nama_file_validity = $nama_file_validity;
				
			}
							
				if($data->update()){
				$res['code'] = "200";
				$res['status'] = "success";
				$res['message'] = "Data berhasil di Simpan";
				$res['data'] = $data;
				return response($res,200);	
				} else {
					 return response()->json([
					'code' => '500',
					'status' => 'error',
					'error' => 'Internal Server Error',
					'message' => 'Tidak dapat Diproses',
				],500);
				} 
		} else {
				return response()->json([
				'code' => '404',
				'status' => 'error',
				'error' => 'Not Found',
				'message' => ['nomor_jaminan' => 'Nomor Jaminan tidak Ditemukan'],
			],404);
		}
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
