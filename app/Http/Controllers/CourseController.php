<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function free()
    {
      $url = 'https://gate.bisaai.id/bisa_design_prod/';
      $url2 = 'https://portal2.bisaai.id:8080/bisa_business_dev/';

      // Http Client
      $courses = Http::get($url.'course/get_course?is_free=1&is_aktif=1');
      $courses = $courses->json();
      $data = $courses['data'];

      $course = [];
      foreach($data as $crs){
        if($crs['price'] == 0){
          $course[] = $crs;
        }
      }

      return view('course.course-free', [
        "title" => "Belajar Online",
        "course" => $course,
        "price" => "Free"
      ]);
    }

    public function premium(){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $url2 = 'https://portal2.bisaai.id:8080/bisa_business_dev/';
        $urlB = 'https://gate.bisaai.id/elearning2/';

        $courses = Http::get($url.'course/get_course?is_free=0&is_ojt=2&is_aktif=1');
        $courses = $courses->json();
        $data = $courses['data'];

        // dd($data);

        $slugs = [];
        foreach ($data as $crs) {
            $slugs[] = $crs['id_course'];
        }

        return view('course.course-premium', [
            'title' => 'Premium Course',
            'course' => $data,
            'slugs' => $slugs
        ]);

    }

    public function ojt(){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $url2 = 'https://portal2.bisaai.id:8080/bisa_business_dev/';

        $courses = Http::get($url.'course/get_course?is_ojt=1&is_aktif=1');
        $courses = $courses->json();
        $data = $courses['data'];
        // dd($data);

        $slugs = [];
        foreach ($data as $crs) {
            $slugs[] = $crs['id_course'];
        }

        return view('course.course-premiumOJT', [
            'title' => 'Premium Course + OJT',
            'course' => $data,
            'slugs' => $slugs
        ]);
    }

    public function detail($slug){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $url2 = 'https://portal2.bisaai.id:8080/bisa_business_dev/';
        $urlB = 'https://gate.bisaai.id/elearning2/';
        $token = session()->get('token');
        $slug = $slug.'=';
        $slug = base64_decode($slug);
        // dd($slug);

        $courses = Http::get($url.'course/get_course?is_aktif=1&is_limit=50');
        // $courses = json_decode($courses->getBody()->getContents());
        $courses = $courses->json();
        $data = $courses['data'];

        // dd($data);

        $course = [];
        foreach($data as $crs){
            if($crs['id_course'] == $slug){
                $course = $crs;
            }
        }

        // Rekomendasi
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'course/get_course_recommendation?rec_id='.$slug,
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

        $rekomen = curl_exec($curl);

        curl_close($curl);

        $rekomen = json_decode($rekomen, true);
        $rekomen = $rekomen['data'];
        $rekomen = array_slice($rekomen, 0, 3);

        // Portfolio Hasil
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/portofolio/get_portofolio_landing?mode=2&limit=3&id_course='.$slug,
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

        // testimoni
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://gate.bisaai.id/bisa_design_prod/academy/get_customer_testimoni_and_rating_landing?limit=8&id_course=$slug&order_by=waktu_desc",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $testi = curl_exec($curl);

        curl_close($curl);

        // json
        $testi = json_decode($testi, true);
        $testi = $testi['data'];
        // dd($testi);

        // if token isset
        if(isset($token)){
            if(!$token){
                return redirect('/login');
            }
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'academy/get_customer_course',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: JWT '.$token,
            ),
            ));

            $registered = curl_exec($curl);

            curl_close($curl);
            // $registered to json
            $registered = json_decode($registered, true);
            $registered = $registered['data'];
            // registered course foreach status == 1
            $registered_course = [];
            foreach($registered as $reg){
                if($reg['status'] == 1){
                    $registered_course[] = $reg;
                }
            }
            // get only id of $registered_course
            $id_registered = [];
            foreach($registered_course as $reg){
                $id_registered[] = $reg['id_course'];
            }
            // check if $slug in $id_registered
            $registered = false;
            foreach($id_registered as $id){
                if($id == $slug){
                    $registered = true;
                }
            }
            return view('course.course-detail', [
                "title" => "Course Detail",
                "course" => $course,
                "registered" => $registered,
                "rekomen" => $rekomen,
                "portfolio" => $portfolio,
                "testi" => $testi,
            ]);
        }

        // dd($course);
        return view('course.course-detail', [
            "title" => "Course Detail",
            "course" => $course,
            "slug" => $course['id_course'],
            "rekomen" => $rekomen,
            "portfolio" => $portfolio,
            "testi" => $testi,
        ]);
    }

    public function checkout($slug){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $urlB = 'https://gate.bisaai.id/elearning2/';
        // dd($slug);
        $slug = $slug.'=';
        $slug = base64_decode($slug);
        $token = session()->get('token');

        $courses = Http::get($url.'course/get_course?is_aktif=1&is_limit=50');
        $courses = $courses->json();
        $data = $courses['data'];

        // dd("JWT ".(session()->get('token')));

        $course = [];
        foreach($data as $crs) {
            if($crs['id_course'] == $slug) {
                $course = $crs;
            }
        }

        $price = [];
        if($course['price'] == 0) {
            $price = "Free";
        } else {
            $price = $course['price'];
        }

        if(isset($token)){
            if(!$token){
                return redirect('/login');
            }
            // dd($course);
            // registered course
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'academy/get_customer_course',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: JWT '.$token,
            ),
            ));

            $registered = curl_exec($curl);

            curl_close($curl);
            // $registered to json
            $registered = json_decode($registered, true);
            // $registered to json
            $registered = $registered['data'];
            // registered course foreach status == 1
            $registered_course = [];
            foreach($registered as $reg){
                if($reg['status'] == 1){
                    $registered_course[] = $reg;
                }
            }
            // get only id of $registered_course
            $id_registered = [];
            foreach($registered_course as $reg){
                $id_registered[] = $reg['id_course'];
            }
            // check if $slug in $id_registered
            $registered = false;
            foreach($id_registered as $id){
                if($id == $slug){
                    $registered = true;
                }
            }
            return view('course.course-checkout', [
                "title" => "Checkout",
                "course" => $course,
                "price" => $price,
                "registered" => $registered
            ]);
        }

        return view('course.course-checkout', [
            "title" => "Checkout",
            "course" => $course,
            "price" => $price
        ]);
    }

    public function enroll(Request $request) {
        // dd($request->all());
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $urlB = 'https://gate.bisaai.id/elearning2/';
        $course_id = $request->course_id;
        $email = $request->email;
        if(!session()->get('token')){
            return redirect('/login');
        }
        $token = "JWT ".(session()->get('token'));
        // dd($token, $course_id, $email);
        // Enroll
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/insert_customer_course',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "id_course":"'.$course_id.'",
            "email" : "'.$email.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        // dd($response);


        return redirect('/transaction')->with('success', 'Berhasil mendaftar kelas');

    }

    public function enrollPaid(Request $request){
        // dd($request->all());
        $url = 'https://gate.bisaai.id/bisa_design_prod/';

        $course_id = $request->course_id;
        $kd_service = $request->service;
        $kd_unik = $request->kd_unik;
        $kd_unik = (int)$kd_unik;
        $coupon = $request->coupon;
        $coupon = preg_replace('/\s+/', '', $coupon);
        if($coupon == "") {
            $coupon = null;
        }
        if(!session()->get('token')){
            return redirect('/login');
        }
        $token = "JWT ".(session()->get('token'));

        // with coupon
        if($coupon != null){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'academy/insert_customer_course_paid',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "id_course":"'.$course_id.'",
                "service_code":"'.$kd_service.'",
                "kode_unik_sprint":"'.$kd_unik.'",
                "coupon":"'.$coupon.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: '.$token.''
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // $response to json
            $response = json_decode($response, true);

            // dd($response);
            // echo $response;
            if($response['status_code'] == 200) {
                return redirect('/transaction') -> with('success', 'Berhasil mendaftar kelas');
            } else {
                return back() -> with('errorkupon', $response['description']);
            }

        }else{
            // w/o coupon
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'academy/insert_customer_course_paid',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "id_course":"'.$course_id.'",
                "service_code":"'.$kd_service.'",
                "kode_unik_sprint":"'.$kd_unik.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: '.$token.''
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // $response to json
            $response = json_decode($response, true);

            // dd($response);
            // echo $response;
            if($response['status_code'] == 200) {
                $transaksi_dat = $response['data'][0];
                $red_url = $transaksi_dat['redirect_url'];
                return redirect($red_url);
            } elseif($response['status_code'] == 500) {
                return back() -> with('errorkupon', $response['error']);
            } else {
                return back() -> with('errorkupon', $response['description']);
            }
        }
    }

    public function transaction() {
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $urlB = 'https://gate.bisaai.id/elearning2/';
        if(!session()->get('token')){
            return redirect('/login');
        }

        $token = "JWT ".(session()->get('token'));
        // Transaction
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'transaction/get_transaction_course',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // respone to json
        $response = json_decode($response, true);
        // dd($response);
        $pages = ceil($response['row_count'] / $response['offset']);
        $page = array();
        for($i = 1; $i <= $pages; $i++){
            $page[] = $i;
        }
        // dd($page);
        // dd($response);

        return view('course.course-transaction', [
            "title" => "Transaction",
            "data" => $response,
            "page" => $page
        ]);
    }

    public function searchTransaction(Request $request){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        if(!session()->get('token')){
            return redirect('/login');
        }
        $token = "JWT ".(session()->get('token'));
        // dd($request->all());
        $search = $request->search;
        $sort = $request->sort;
        $pageC = $request->page;
        if($pageC == null){
            $pageC = "1";
        }
        $status = $request->status;
        // dd($search, $sort);

        $status = $request->status;
        $id_transaction = $request->id_transaction;
        $image = $request->inputBukti;
        // Course
        if($sort == 'course'){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'transaction/get_transaction_course?q='.$search.'&page='.$pageC.'&status='.$status,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$token.''
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // respone to json
            $response = json_decode($response, true);
            // create pages for pagination from response if response row_count / offset != 1 add more page number
            $pages = ceil($response['row_count'] / $response['offset']);
            $page = array();
            for($i = 1; $i <= $pages; $i++){
                $page[] = $i;
            }
            // dd($pagination);

            // dd($response);

            return view('course.course-transaction', [
                "title" => "Transaction",
                "data" => $response,
                "search" => $search,
                "sort" => $sort,
                "page" => $page,
                "status" => $status,
                "pageC" => $pageC
            ]);
        }
        // Certificate
        if($sort == 'certif'){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/certification/get_certification_transaction?search='.$search.'&page='.$pageC.'&status='.$status,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$token.''
            ),
            ));

            $certif = curl_exec($curl);

            curl_close($curl);

            $certif = json_decode($certif, true);

            $pages = ceil($certif['row_count'] / $certif['offset']);
            $page = array();
            for($i = 1; $i <= $pages; $i++){
                $page[] = $i;
            }
            $certif = $certif['data'];

            return view('course.course-transaction', [
                "title" => "Transaction",
                "certif" => $certif,
                "search" => $search,
                "sort" => $sort,
                "page" => $page,
                "status" => $status,
                "pageC" => $pageC
            ]);
        }
        if($sort == 'lpath'){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/transaction/get_transaction_learning_path?q='.$search.'&page='.$pageC.'&status='.$status,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$token.''
            ),
            ));

            $lpath = curl_exec($curl);

            curl_close($curl);

            // json
            $lpath = json_decode($lpath, true);

            $pages = ceil($lpath['row_count'] / $lpath['offset']);
            $page = array();
            for($i = 1; $i <= $pages; $i++){
                $page[] = $i;
            }
            $lpath = $lpath['data'];
            return view('course.course-transaction', [
                "title" => "Transaction",
                "lpath" => $lpath,
                "search" => $search,
                "sort" => $sort,
                "page" => $page,
                "status" => $status,
                "pageC" => $pageC
            ]);
        }
    }


    public function updateTransaction(Request $request) {
        $token = session()->get('token');
        if(!$token){
            return redirect('/login');
        }
        // $status = (int) $request->status;
        $id_transaction = $request->id_transaction;
        $image = $request->photoB;
        $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/transaction/update_transaction',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "id_transaction":"'.$id_transaction.'",
            "photo" : "'.$image.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token.'',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        // dd($response);

        return back()->with('successBuktiTF', 'Bukti Transfer Terkirim');
    }


    public function bayarUlang(Request $request) {
        $token = session()->get('token');
        if(!$token){
            return redirect('/login');
        }
        $id_transaction = $request->id_transaction;
        $service_code = $request->service_code;
        // dd($id_transaction, $service_code);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/transaction/update_transaction_sprint',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "id_transaction" : "'.$id_transaction.'",
            "service_code" : "'.$service_code.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: JWT '.$token.'',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // to json
        $response = json_decode($response, true);

        // $response = $response['data'];

        // dd($response);
        if($response['status_code'] == 200){
            $transaksi_data = $response['data'];
            $red_url = $transaksi_data['redirect_url'];
            return redirect($red_url);
        }else{
            return back()->with('error', 'Terjadi Kesalahan');
        }
    }

}
