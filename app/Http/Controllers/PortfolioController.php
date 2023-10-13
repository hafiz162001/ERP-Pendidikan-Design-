<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// guzzle
use GuzzleHttp\Client;

class PortfolioController extends Controller
{
    public function index(){
        // $page = '&page=';
        // dd($request->all());
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_portofolio_landing?mode=2&limit=9',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // json
        $response = json_decode($response, true);
        $pages = $response['row_count'];
        $numberPage = ceil($pages/10);
        $number = range(1, $numberPage);
        $page = array_map('intval', $number);
        $response = $response['data'];

        // Kategori
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_kategori_portofolio?is_aktif=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $kategori = curl_exec($curl);
        curl_close($curl);
        // json
        $kategori = json_decode($kategori, true);
        $kategori = $kategori['data'];

        // list course
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_list_course_for_filtering_landing_portofolio',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $list_course = curl_exec($curl);

        curl_close($curl);

        // json
        $list_course = json_decode($list_course, true);
        $list_course = $list_course['data'];
        // dd($list_course);

        return view('portfolio.portfolio', [
            "title" => "Portfolio",
            "data" => $response,
            "kategori" => $kategori,
            "list_course" => $list_course,
            "page" => $page
        ]);

    }

    public function detail($id){
        // token
        $token = session()->get('token');
        // dd($id);
        $id = $id.'=';
        $id = base64_decode($id);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_portofolio_landing?id_portofolio='.$id.'&page=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // json
        $response = json_decode($response, true);
        $response = $response['data'][0];

        // terkait portfolio
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_portofolio_landing?limit=3&mode=2&order_by=like_desc&id_kategori_portofolio='.$response['id_kategori_portofolio'],
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

        // exclude currently viewed portfolio
        $portfolio = array_filter($portfolio, function($portfolio) use ($id) {
            return $portfolio['id_portofolio'] != $id;
        });



        if(isset($token)){
            // cek like
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/cek_is_like_portofolio?id_portofolio='.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: JWT '.$token
            ),
            ));

            $cek_like = curl_exec($curl);

            curl_close($curl);

            // to json
            $cek_like = json_decode($cek_like, true);
            $cek_like = $cek_like['data'];
            // dd($response);

            return view('portfolio.portfolio-detail', [
                "title" => "Portfolio",
                "data" => $response,
                'crs' => $response,
                'porto' => $portfolio,
                'media_p' => $media_p,
                'cek_like' => $cek_like
            ]);

        }

        return view('portfolio.portfolio-detail', [
            "title" => "Portfolio",
            "data" => $response,
            'crs' => $response,
            'porto' => $portfolio,
            'media_p' => $media_p,
        ]);

    }

    public function myPortfolio(){
        $token = session()->get('token');
        $urlB = 'https://gate.bisaai.id/elearning2/';
        // dd($token);

        // if token is not set return to login
        if(!$token){
            return redirect('/login');
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        // CURLOPT_URL => $urlB.'portofolio/get_customer_portofolio',
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_customer_portofolio',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // to json
        // dd($response);
        $response = json_decode($response, true);
        $response = $response['data'];
        // dd($response);

        // Kategory
        $curl = curl_init();

        curl_setopt_array($curl, array(
        // CURLOPT_URL => $urlB.'portofolio/get_kategori_portofolio?is_aktif=1',
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_kategori_portofolio?is_aktif=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $kategori = curl_exec($curl);

        curl_close($curl);
        // to json
        $kategori = json_decode($kategori, true);
        $kategori = $kategori['data'];

        // dd($kategori);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        // CURLOPT_URL => $urlB.'portofolio/get_list_course_for_insert_portofolio',
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_list_course_for_insert_portofolio',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token
        ),
        ));

        $finished_crs = curl_exec($curl);

        curl_close($curl);
        // to json
        $finished_crs = json_decode($finished_crs, true);
        $finished_crs = $finished_crs['data'];
        // dd($finished_crs);

        // token
        $token = session()->get('token');
        $token = "JWT $token";

        return view('portfolio.my-portfolio', [
            "title" => "My Portfolio",
            "data" => $response,
            "kategori" => $kategori,
            "finished_crs" => $finished_crs,
            "token" => $token,
        ]);
    }

    public function submit(Request $request){
        $urlB = 'https://gate.bisaai.id/elearning2/';
        $token = session()->get('token');
        if(!$token){
            return redirect('/login');
        }

        $dat = $request->all();
        // dd($dat);
        $name = $dat['name'];

        $finished_crs = $dat['finished_crs'];
        // finished_crs parse to int
        $finished_crs = intval($finished_crs);

        $kategori = $dat['kategori'];
        // kategori to int
        $kategori = intval($kategori);

        $photo1 = $dat['photo1_base64'];
        $photo1 = preg_replace('/^data:image\/\w+;base64,/', '', $photo1);

        $photo2 = $dat['photo2_base64'];
        $photo2 = preg_replace('/^data:image\/\w+;base64,/', '', $photo2);

        $photo3 = $dat['photo3_base64'];
        $photo3 = preg_replace('/^data:image\/\w+;base64,/', '', $photo3);

        $thumb = $dat['thumb_base64'];
        $thumb = preg_replace('/^data:image\/\w+;base64,/', '', $thumb);

        // $des_lengkap = $dat['des_lengkap'];
        $des_lengkap = $request->des_lengkap;
        // get image size in des_lengkap
        // $des_lengkap_size = getimagesize($des_lengkap);
        $des_singkat = $request->des_singkat;
        // dd($des_singkat, $des_lengkap, $thumb, $photo1, $photo2, $photo3, $name, $finished_crs, $kategori);
        // dd($des_lengkap);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/insert_portofolio',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "id_kategori_portofolio" : '.$kategori.',
            "id_customer_course" : '.$finished_crs.',
            "nama_portofolio" : "'.$name.'",
            "deskripsi_singkat": "'.$des_singkat.'",
            "deskripsi_lengkap": "'.$des_lengkap.'",
            "carousel1" : "'.$photo1.'",
            "carousel2" : "'.$photo2.'",
            "carousel3" : "'.$photo3.'",
            "foto_portofolio" : "'.$thumb.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token,
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // json
        $response = json_decode($response, true);
        // dd($response);
        if($response['status_code'] == 400){
            return redirect('/my-portfolio')->with('errorPorto', 'Portfolio gagal ditambahkan, mohon lengkapi data akun anda');
        }else{
            return redirect('/my-portfolio')->with('successPorto', $response['description']);
        }

    }

    public function myDetailPorto($id){
        $token = session()->get('token');
        // dd($id);
        if(!$token){
            return redirect('/login');
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_customer_portofolio?id_portofolio='.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // to json
        $response = json_decode($response, true);
        // dd($response);
        if(empty($response['data'])){
            return redirect('/my-portfolio');
        }
        $response = $response['data'][0];

        // finished crs
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_list_course_for_insert_portofolio',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token
        ),
        ));

        $finished = curl_exec($curl);

        curl_close($curl);
        // to json
        $finished = json_decode($finished, true);
        $finished = $finished['data'];
        // dd($finished);
        // dd($response);
        // Kategori
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_kategori_portofolio',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $kategori = curl_exec($curl);

        curl_close($curl);
        $kategori = json_decode($kategori, true);
        $kategori = $kategori['data'];
        // token
        $token = "JWT $token";

        return view('portfolio.detail-porto', [
            "title" => $response['nama_portofolio'],
            "data" => $response,
            "finished" => $finished,
            "kategori" => $kategori,
            "token" => $token,
            "id_porto" => $id
        ]);
    }

    public function like(Request $request){
        // token
        $token = session()->get('token');
        // dd($request->all());
        if(!$token){
            return redirect('/login');
        }
        $id_porto = $request->id_porto;
        // parse to int
        $id_porto = (int)$id_porto;
        $action = (int) $request->action;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/like_unlike_portofolio',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "id_portofolio" : '.$id_porto.',
            "action" : 1
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token,
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return redirect()->back();
    }

    public function dislike(Request $request){
        // token
        $token = session()->get('token');
        // dd($request->all());
        $id_porto = $request->id_porto;
        // parse to int
        $id_porto = (int)$id_porto;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/like_unlike_portofolio',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "id_portofolio" : '.$id_porto.',
            "action" : 2
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token,
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        // redirect back
        return redirect()->back();
    }
}
