<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function national()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification?tipe=2&is_aktif=1',
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
        // echo $response;
        $response = json_decode($response, true);
        $response = $response['data'];
        // dd($response);

        // Kat
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification_category',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $kat = curl_exec($curl);

        curl_close($curl);

        $kat = json_decode($kat, true);
        $kat = $kat['data'];
        // dd($kat);

        // partner
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification_partner',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $partner = curl_exec($curl);

        curl_close($curl);

        $partner = json_decode($partner, true);
        $partner = $partner['data'];
        // dd($partner);

        return view('certification.national', [
            "title" => "Sertifikasi Nasional",
            "data" => $response,
            "kat" => $kat,
            "partner" => $partner,
        ]);
    }

    public function international()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification?tipe=1&is_aktif=1',
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
        // echo $response;
        // to json
        $response = json_decode($response, true);
        $response = $response['data'];
        // dd($response);

        // Kat
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification_category',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $kat = curl_exec($curl);

        curl_close($curl);

        $kat = json_decode($kat, true);
        $kat = $kat['data'];
        // dd($kat);

        // partner
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification_partner',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $partner = curl_exec($curl);

        curl_close($curl);

        $partner = json_decode($partner, true);
        $partner = $partner['data'];

        return view('certification.international', [
            "title" => "Sertifikasi Internasional",
            "data" => $response,
            "kat" => $kat,
            "partner" => $partner,
        ]);
    }

    public function sertifdetail($id){
        $token = session()->get('token');
        // dd($id);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification?id_certification='.$id,
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

        // to json
        $response = json_decode($response, true);
        $response = $response['data'][0];
        // dd($response);

        $harga = [];
        if($response['harga'] == 0){
            $harga = "Free";
        } else {
            $harga = "Rp. ".number_format($response['harga'], 0, ',', '.');
        }

        // course require
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_cert_req_course?is_aktif=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $reqCourse = curl_exec($curl);

        curl_close($curl);

        $reqCourse = json_decode($reqCourse, true);
        $reqCourse = $reqCourse['data'];

        // dd($reqCourse, $response);
        // foreach get reqcourse same with id_certification
        $reqCrs = [];
        foreach ($reqCourse as $key => $value) {
            if($value['id_certification'] == $id){
                $reqCrs[] = $value;
            }
        }
        // dd($reqCourseSame);

        // check if pass course requirement
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/check_my_req_course?id_certification='.$id,
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => '',
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => 'GET',
        // CURLOPT_HTTPHEADER => array(
        //     'Authorization: JWT '.$token
        // ),
        // ));

        // $passReq = curl_exec($curl);

        // curl_close($curl);
        // $passReq = json_decode($passReq, true);
        // $passReq = $passReq['data'][0];
        // dd($passReq);


        return view('certification.certification-detail', [
            "title" => "Certification",
            "data" => $response,
            "price" => $harga,
            "reqCrs" => $reqCrs,
            // "passReq" => $passReq,
        ]);

    }

    public function checkout(Request $request){
        if(!session()->get('token')){
            return redirect('/login');
        }
        // dd($request->all());
        $token = session()->get('token');
        $kupon = $request->kupon;
        $kupon = preg_replace('/\s+/', '', $kupon);
        $service = $request->service;
        $kd_unik = (int) $request->kd_unik;
        $id_certification = (int) $request->id_certification;
        // dd($kupon, $service, $kd_unik, $id_certification);
        if($kupon != null){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/insert_customer_certification',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "id_certification" : "'.$id_certification.'",
                "service_code" : "'.$service.'",
                "kode_unik_sprint" : "'.$kd_unik.'",
                "kupon" : "'.$kupon.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: JWT '.$token,
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // dd($response);
            // to json
            $response = json_decode($response, true);
            // dd($response);
            if($response['status_code'] == 200 ){
                $red_url = $response['data'][0]['redirect_url'];
                return redirect($red_url);
            } elseif($response['status_code'] == 500){
                return redirect()->back() -> with('error', 'Terjadi Kesalahan');
            } else {
                return redirect()->back() -> with('error', $response['description']);
            }
        }else{
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/insert_customer_certification',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "id_certification" : "'.$id_certification.'",
                "service_code" : "'.$service.'",
                "kode_unik_sprint" : "'.$kd_unik.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: JWT '.$token,
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // to json
            $response = json_decode($response, true);
            // dd($response);
            if($response['status_code'] == 200 ){
                $red_url = $response['data'][0]['redirect_url'];
                return redirect($red_url);
            } elseif($response['status_code'] == 500){
                return redirect()->back() -> with('error', 'Terjadi Kesalahan');
            } else {
                return redirect()->back() -> with('error', $response['description']);
            }

        }

    }

    public function checkoutFree(Request $request){
        // dd($request->all());
        $token = session()->get('token');
        $id_certification = (int) $request->id_certification;
        // dd($id_certification);
        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/insert_customer_certification',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "id_certification" : "'.$id_certification.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: JWT '.$token,
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // to json
            $response = json_decode($response, true);
            // dd($response);
            if($response['status_code'] == 200 ){
                return redirect('/transaction');
            } elseif($response['status_code'] == 500){
                return redirect()->back() -> with('error', 'Terjadi Kesalahan');
            } else {
                return redirect()->back() -> with('error', $response['description']);
            }
    }

    public function myCertification(){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $token = session()->get('token');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_customer_certification?is_aktif=1',
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

        $response = json_decode($response, true);
        $response = $response['data'];
        // get status only == 2
        $response = array_filter($response, function($value) {
            return $value['status_certification'] == 2;
        });
        // dd($response);
        return view('certification.my-certification', [
            "title" => "My Certification",
            "data" => $response,
        ]);
    }

    public function certification($id){
        if(!session()->get('token')){
            return redirect('/login');
        }
        // dd($id);
        $token = session()->get('token');

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_customer_certification?is_aktif=1&id_certification='.$id,
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

        $response = json_decode($response, true);
        // dd($response);
        if(empty($response['data'])){
            return redirect('/certification');
        }

        $response = $response['data'][0];

        return view('certification.certification', [
            "title" => "Certification",
            "data" => $response,
        ]);
    }

    function bayarUlang(Request $request){
        if(!session()->get('token')){
            return redirect('/login');
        }
        // dd($request->all());
        $id_transaction = $request->id_transaction;
        $invoice = $request->invoice;
        $service = $request->service_code;
        // dd($service, $invoice, $id_transaction);
        // token
        $token = session()->get('token');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/elearning2/certification/update_certification_transaction',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "id_transaction" : "'.$id_transaction.'",
            "invoice_number" : "'.$invoice.'",
            "service_code" : "'.$service.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token,
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);
        // dd($response);
        if($response['status_code'] == 200 ){
            return redirect()->back() -> with('successTransaction', $response['description']);
        } else {
            return redirect()->back() -> with('errorTransaction', $response['description']);
        }
    }
}
