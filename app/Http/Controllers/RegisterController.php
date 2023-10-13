<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function index(){
        if(session()->has('token')){
            return redirect()->back();
        }
        return view('register', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $urlB = 'https://gate.bisaai.id/elearning2/';
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:50',
            'confirm_password' => 'required|min:8|max:50|same:password',
        ]);
        $email = $validatedData['email'];
        $password = $validatedData['password'];
        $name = $validatedData['name'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/users/register',
        // CURLOPT_URL => 'https://gate.bisaai.id/elearning2/users/register',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "email": "'.$email.'",
            "password": "'.$password.'",
            "name": "'.$name.'",
            "agree": 1,
            "dateofbirth": "1992-01-30",
            "address": "",
            "gender": 1
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // json
        $response = json_decode($response, true);

        // dd($response);

        if($response['status_code'] == 200){
            return redirect('/login')->with('successRegist', 'Registrasi Berhasil');
        }else{
            return back()->with('errorRegist', $response['description']);
        }
    }
}
