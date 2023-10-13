<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){
        // dd(config('global.urls.Url'));
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/course/get_course?is_aktif=1&is_limit=50',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        $response = $response['data'];
        // dd($response);
        // sort descending by number_of_students
        usort($response, function($a, $b) {
            return $b['number_of_students'] - $a['number_of_students'];
        });
        // dd($response);
        // get only first 3 courses
        $response = array_slice($response, 0, 3);
        // dd($response);

        $media = 'https://gate.bisaai.id/bisa_design_prod/course/media/';

        // fav portfolio
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_portofolio_landing?mode=2&limit=3&order_by=like_desc',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $portfolio = curl_exec($curl);

        curl_close($curl);
        $portfolio = json_decode($portfolio, true);
        $portfolio = $portfolio['data'];
        // dd($portfolio);

        $media_p = 'https://gate.bisaai.id/bisa_design_prod/portofolio/media/foto_portofolio/';

        // CERTIFICATION
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response_cert = curl_exec($curl);

        curl_close($curl);
        $response_cert = json_decode($response_cert, true);
        $response_cert = $response_cert['data'];
        // dd($response_cert);

        // dd($response);
        // sort descending by jumlah_peserta
        usort($response_cert, function($a, $b) {
            return $b['jumah_peserta'] - $a['jumah_peserta'];
        });


        // dd($response_cert);
        // get only first 3 courses
        $response_cert = array_slice($response_cert, 0, 3);
        // dd($response_cert);

        return view('home', [
            'title' => 'Home',
            'crs' => $response,
            'media' => $media,
            'porto' => $portfolio,
            'media_p' => $media_p,
            'certif' => $response_cert,
        ]);
    }
}
