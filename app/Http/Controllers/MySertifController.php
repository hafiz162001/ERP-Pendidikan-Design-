<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MySertifController extends Controller
{
    public function index()
    {
        if(!session()->get('token')){
            return redirect('/login');
        }
        $token = session()->get('token');
        // dd($token);
        $media = 'https://gate.bisaai.id/bisa_design_prod/master_sertifikat/media/course/id_course/';
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/academy/get_my_sertifikat?status=2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: JWT '.$token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // to json
        $response = json_decode($response, true);
        $data = $response['data'];
        // dd($response);
        return view('academy.my-sertifikat', [
            "title" => "Sertifikat Saya",
            "data" => $data,
            "media" => $media,
            "token" => $token
        ]);
    }
}
