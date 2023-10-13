<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index(){
        // if isset session user, redirect to dashboard
        if(session()->has('token')){
            return redirect()->back();
        }

        // session(['url.intended' => url()->previous()]);
        // set url previous without login, logout, forgot-pass, register
        if(!strpos(url()->previous(), 'register') && !strpos(url()->previous(), 'login') && !strpos(url()->previous(), 'logout') && !strpos(url()->previous(), 'forgot-pass')){
            session(['url.intended' => url()->previous()]);
        }
        // session previous page without register page


        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function auth(Request $request){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $urlB = 'https://gate.bisaai.id/elearning2/';

        $validatedData=$request->validate([
            // 'email' => 'required|email:dns',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $validatedData['email'];
        $password = $validatedData['password'];

        // Http Client auth
        $response = Http::post($url.'auth',
            [
                'username' => $email,
                'password' => $password,
            ]
        );

        $response = $response -> json();

        // dd($response);

        // Login Func
        if(isset($response['access_token'])){
            $responses = "JWT {$response['access_token']}";

            // Curl Cek Credential
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'cek_credential',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: '.$responses.'',
            ),
            ));
            $credential= curl_exec($curl);
            curl_close($curl);
            $credential = json_decode($credential, true);
            // dd($credential);
            $credential = $credential['data'][0];
            $request->session()->put('data', $credential);
            $request->session()->put('token', $response['access_token']);
            // prevent user back to login page

            // dd($credential, $response['access_token']);

            if(session()->has('url.intended')){
                return redirect(session()->get('url.intended'));
            }else{
                return redirect()->route('/');
            }

            // return redirect('/')->with('successLogin', 'Login Success');



        }else{
            // return back
            return back()->with('errorLogin', 'Login Failed');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/login')->with('successLogout', 'Logout Success');
    }

    public function forgetPass(){
        if(session()->has('token')){
            return redirect()->back();
        }

        return view('forget-pass', [
            'title' => 'Forget Pass',
        ]);
    }

    public function newPass(Request $request){
        // dd($request->all());
        $email = $request->email;
        // dd($email);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/users/forgotpassword',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "email": "'.$email.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        // dd($response);
        if($response['status_code'] == 200){
            return redirect('/login')->with('successGantiPass', 'Berhasil mengganti password, silahkan cek email anda');
        }else{
            return back()->with('errorPass', 'Terjadi Kesalahan');
        }
        // return redirect('/login')->with('success', 'Success');
    }
}
