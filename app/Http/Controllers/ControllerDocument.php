<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jaminan;
use App\Http\Controllers\Response;
use Carbon\Carbon;

class ControllerDocument extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function getDownload()
{
    //PDF file is stored under project/public/download/info.pdf
    $file= storage_path() . "/download/help.pdf";

$headers = [
              'Content-Type' => 'application/pdf',
           ];

return response()->download($file, 'Panduan Teknis Integrasi.pdf', $headers);
}
	

}
