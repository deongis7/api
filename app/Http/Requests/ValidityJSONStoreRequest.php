<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidityJSONStoreRequest extends FormRequest
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
		  'no_validity' => 'required|max:30',
          'penanda_tangan' => 'required|max:255',
          'jabatan_penanda_tangan' => 'required|max:255',	  
		  'tgl_konfirmasi' => 'required',
          'nama_file_validity' => 'required|base64mimes:pdf',
     
        ];
    }
	
	    public function messages()
    {
        return [
            'no_validity.required' => 'No Validity harus Diisi!',
            'penanda_tangan.required' => 'Penanda Tangan harus Diisi!',
            'jabatan_penanda_tangan.required' => 'Jabatan Penanda Tangan harus Diisi!',
            'tgl_konfirmasi.required' => 'Tanggal Konfirmasi harus Diisi!',
			'nama_file_validity.required' => 'Nama File Validity harus Diisi!',
			'no_validity.max' => 'No. Validity harus Maximal 30 Karakter!',
			'penanda_tangan.max' => 'Penanda Tangan harus Maximal 255 Karakter!',
            'jabatan_penanda_tangan.max' => 'Jabatan Penanda Tangan harus Maximal 255 Karakter!',
			'nama_file_validity.base64mimes' => 'File Validity harus tipe PDF!',
            
            
        ];
    }
}
