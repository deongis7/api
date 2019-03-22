<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JaminanStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
		  'tgl_kirim' => 'required',
          'bank_penerbit' => 'required|max:3',
          'alamat_bank_penerbit' => 'required|max:255',	  
		  'nomor_jaminan' => 'required|max:30',
          'jenis_jaminan' => 'required|max:2',
          'jenis_produk' => 'required|max:1',		  
		  'beneficary' => 'required|max:25',
          'unit_pengguna' => 'required|max:255',
          'applicant' => 'required|max:255',
          'no_kontrak' => 'required|max:30',
          'uraian_pekerjaan' => 'max:255',
          'currency' => 'required|max:3',
          'nilai_jaminan' => 'required|max:17',
          'tgl_terbit' => 'required',
          'tgl_berlaku' => 'required',
          'tgl_berakhir' => 'required',
          'nama_file_jaminan' => 'required|base64mimes:pdf',
          'nama_user' => 'required',
          'email' => 'required',	  
        ];
    }
	
	    public function messages()
    {
        return [
            'tgl_kirim.required' => 'Tanggal Kirim harus Diisi!',
            'bank_penerbit.required' => 'Bank Penerbit harus Diisi!',
            'alamat_bank_penerbit.required' => 'Alamat Bank Penerbit harus Diisi!',
            'nomor_jaminan.required' => 'Nomor Jaminan harus Diisi!',
			'jenis_jaminan.required' => 'Jenis Jaminan harus Diisi!',
			'jenis_produk.required' => 'Jenis Produk harus Diisi!',
			'beneficary.required' => 'Beneficary harus Diisi!',
			'unit_pengguna.required' => 'Unit Pengguna harus Diisi!',
			'applicant.required' => 'Applicant harus Diisi!',
			'no_kontrak.required' => 'No Kontrak harus Diisi!',
			'currency.required' => 'Currency harus Diisi!',
			'nilai_jaminan.required' => 'Nilai Jaminan harus Diisi!',
			'tgl_terbit.required' => 'Tanggal Terbit harus Diisi!',
			'tgl_berlaku.required' => 'Tanggal Berlaku harus Diisi!',
			'tgl_berakhir.required' => 'Tanggal Berakhir harus Diisi!',
			'nama_file_jaminan.required' => 'Nama File Jaminan harus Diisi!',
			'nama_user.required' => 'Nama User harus Diisi!',
			'email.required' => 'Email harus Diisi!',
            'bank_penerbit.max' => 'Bank Penerbit harus Maximal 3 Karakter!',
            'alamat_bank_penerbit.max' => 'Alamat Bank Penerbit harus Maximal 255 Karakter!',
            'nomor_jaminan.max' => 'Nomor Jaminan harus Maximal 30 Karakter!',
            'jenis_jaminan.max' => 'Jenis Jaminan harus Maximal 2 Karakter!',
            'jenis_produk.max' => 'Jenis Produk harus Maximal 1 Karakter!',
            'beneficary.max' => 'Beneficary harus Maximal 25 Karakter!',
			'unit_pengguna.max' => 'Unit Pengguna harus Maximal 255 Karakter!',
			'applicant.max' => 'Applicant harus Maximal 255 Karakter!',
			'uraian_pekerjaan.max' => 'Uraian Pekerjaan harus Maximal 255 Karakter!',
			'no_kontrak.max' => 'No Kontrak harus Maximal 30 Karakter!',
			'currency.max' => 'Currency harus Maximal 3 Karakter!',
			'nilai_jaminan.max' => 'Nilai Jaminan harus Maximal 17 Karakter!',
			'nama_file_jaminan.base64mimes' => 'File Jaminan harus tipe PDF!',
            
        ];
    }
}
