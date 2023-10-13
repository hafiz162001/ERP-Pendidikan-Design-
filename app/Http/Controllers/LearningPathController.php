<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearningPathController extends Controller
{
    function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/learning_path/get_learning_path?is_aktif=1',
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
        // to json
        $response = json_decode($response, true);
        $response = $response['data'];
        // dd($response);

        return view('learning-path.learning-path', [
            "title" => "Learning Path",
            "data" => $response
        ]);
    }

    function detail($id){
        $id = $id."=";
        $id = base64_decode($id);
        // dd($id);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/learning_path/get_learning_path?id_learning_path='.$id,
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
        // to json
        $response = json_decode($response, true);
        $response = $response['data'][0];
        // dd($response);
        // sort by order urutan asc

        // More info
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/learning_path/get_learning_path_detail?id_learning_path='.$id,
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

        $detail = curl_exec($curl);

        curl_close($curl);
        // json
        $detail = json_decode($detail, true);
        $detail = $detail['data'];
        // dd($detail, $response);
        // dd($detail);

        return view('learning-path.learning-detail', [
            "title" => "Learning Path Detail",
            "data" => $response,
            "detail" => $detail
        ]);

    }

    function enroll(Request $request){
        $token = session()->get('token');
        if(!$token){
            return redirect('/login');
        }
        $token ="JWT ".$token;
        // dd($token);

        // dd($request->all());
        $id_lpath = $request->id_lpath;
        // dd($id_lpath, $token);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/customer_learning_path/insert_customer_learning_path',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "id_learning_path": "'.$id_lpath.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // to json
        $response = json_decode($response, true);
        // dd($response);
        if($response['status_code'] == 200){
            return redirect('/transaction')->with('success', 'Berhasil enroll learning path');
        }else{
            return back()->with('error', 'Gagal, Anda sudah mengikuti learning path ini');
        }
    }

    public function myLpath($id){
        $token = session()->get('token');
        if(!$token){
            return redirect('/login');
        }
        // dd($id);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/academy/get_customer_course?status=1&id_customer_learning_path='.$id,
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

        // json
        $response = json_decode($response, true);
        $response = $response['data'];

        // dd($response);
        if(empty($response)){
            return redirect('/my-course');
        }

        $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/transaction/get_transaction_learning_path',
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

            $lpath = curl_exec($curl);

            curl_close($curl);

            // json
            $lpath = json_decode($lpath, true);

            $lpath = $lpath['data'];
            $name = $response[0];
            // dd($name);
            // get lpath data which same with $name id_customer_learning_path
            $lpath = array_filter($lpath, function($lpath) use ($name) {
                return $lpath['id_customer_learning_path'] == $name['id_customer_learning_path'];
            });
            // dd($lpath);
            $lpath = array_values($lpath);
            $lpath = $lpath[0];
            // dd($lpath);
        return view('learning-path.my-lpath', [
            "title" => "My Learning Path",
            "data" => $response,
            "lpath" => $lpath
        ]);
    }
}
