<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $token = session()->get('token');
        // if(!$token){
        //     return redirect('/login');
        // }
        // dd($token);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'users/get_profile',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: JWT '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        // to json
        $response = json_decode($response, true);
        $response = $response['data'][0];
        // dd($response);

        // if(!$response) {
        //     return redirect('/login');
        // }

        // My certificate
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_my_sertifikat?status=2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: JWT '.$token.''
        ),
        ));

        $certificate = curl_exec($curl);

        curl_close($curl);
        // to json
        $certificate = json_decode($certificate, true);
        $certificate = $certificate['data'];
        // dd($certificate);

        // linkedin ig
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/cek_credential',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: JWT '.$token.''
        ),
        ));

        $credential = curl_exec($curl);

        curl_close($curl);

        // to json
        $credential = json_decode($credential, true);
        $credential = $credential['data'][0];
        // dd($credential);

        return view('user.user', [
            "title" => "User",
            "user" => $response,
            "sertif" => $certificate,
            "credential" => $credential
        ]);
    }

    public function update(Request $request){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $token = session()->get('token');
        // dd($token);
        $data = $request->all();
        // dd($data);
        if($data['newpass1'] != $data['newpass2']){
            return redirect()->back()->with('errormatch', 'Password baru dan konfirmasi password baru tidak sama');
        }
        $photo = $data['photo64'];
        $photo = substr($photo, strpos($photo, ",") + 1);
        $name = $data['name'];
        $address = $data['address'];
        $edu = $data['edu'];
        $phone = $data['phone'];
        $bdate = $data['bdate'];
        $bdate = date_format(date_create($bdate), "Y-m-d");
        $gender = $data['gender'];
        $gender = (int) $gender;

        $oldpass = $data['oldpass'];
        $newpass = $data['newpass1'];

        $linkedin = $data['linkedin'];
        $instagram = $data['instagram'];
        // $newpass = $validatedData['newpass1'];
        // dd($oldpass, $newpass);

        // dd($photo, $name, $address, $edu, $phone, $pass, $gender);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'users/update_customer',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "name": "'.$name.'",
            "gender": '.$gender.',
            "phone": "'.$phone.'",
            "address": "'.$address.'",
            "educational_background": "'.$edu.'",
            "dateofbirth": "'.$bdate.'",
            "sosmed_linkedin": "'.$linkedin.'",
            "sosmed_instagram": "'.$instagram.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: JWT '.$token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        // to json
        $response = json_decode($response, true);
        // dd($response);
        $name = $response['data']['name'];
        // dd($name);
        // put $name to session
        if ($name) {
            session()->put('name', $name);
        }
        // session()->put('name', $name);
        if($newpass != null) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'users/update_customer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>'{
                "old_password": "'.$oldpass.'",
                "password": "'.$newpass.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: JWT '.$token
            ),
            ));

            $newPassword = curl_exec($curl);

            curl_close($curl);

            // to json
            $newPassword = json_decode($newPassword, true);
            // dd($newPassword);
            if($newPassword['status_code'] == 200){
                return redirect()->back()->with('successPass', 'Password berhasil diubah');
            } else {
                return redirect()->back()->with('errorPass', 'Password gagal diubah');
            }
            // return redirect('/user');
        }

        if($photo) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'users/update_customer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>'{
                "photo": "'.$photo.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: JWT '.$token
            ),
            ));

            $pp = curl_exec($curl);

            curl_close($curl);

            // to json
            $pp = json_decode($pp, true);
            // dd($pp);
            // $pp = $pp['data']['photo'];
            if($pp['status_code'] == 200){
                return redirect()->back()->with('successUpdate', $pp['description']);
            } else {
                return redirect()->back()->with('errorUpdate', 'Foto gagal diubah');
            }
            // return redirect('/user');

        }

        // session()->put('photo', $pp);

        // return redirect('/user');
        if($response['status_code'] == 200){
            return redirect()->back()->with('successUpdate', $response['description']);
        } else {
            return redirect()->back()->with('errorUpdate', 'Data gagal diubah');
        }
    }
}
