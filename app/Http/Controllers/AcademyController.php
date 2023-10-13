<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function myCourse(){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $token = "JWT ".session()->get('token');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_customer_course?status=12',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);
        // json
        curl_close($curl);

        $response = json_decode($response, true);

        // dd($response);
        $pages = ceil($response['row_count'] / $response['offset']);
        $page = array();
        for($i = 1; $i <= $pages; $i++){
            $page[] = $i;
        }
        $data = $response['data'];

        return view('academy.my-course', [
            "title" => "My Course",
            "data" => $data,
            "page" => $page
        ]);
    }

    // Seach my course
    public function searchMyCourse(Request $request){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $token = session()->get('token');
        // dd($token);
        // dd($request->all());
        $sort = $request->sort;
        $search = $request->search;
        $pageC = $request->page;
        // dd($pageC);
        if($pageC == null){
            $pageC = "1";
        }
        $status = $request->status;
        // dd($sort);
        // Free Course
        if($sort == 'free'){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $token = "JWT ".session()->get('token');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_customer_course?q='.$search.'&page='.$pageC.'&status='.$status,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);
        // json
        curl_close($curl);

        $response = json_decode($response, true);
        $data = $response['data'];
        $pages = ceil($response['row_count'] / $response['offset']);
        $page = array();
        for($i = 1; $i <= $pages; $i++){
            $page[] = $i;
        }
        // get only status 1 and status 2
        $data = array_filter($data, function($item){
            return $item['status'] == 1 || $item['status'] == 2;
        });

        return view('academy.my-course', [
            "title" => "Free Course",
            "data" => $data,
            "page" => $page,
            "pageC" => $pageC,
            "search" => $search,
            "sort" => $sort,
            "status" => $status
        ]);
        }
        // master Course
        if($sort == 'master'){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $token = "JWT ".session()->get('token');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_customer_course?is_free=1&is_ojt=2&q='.$search.'&page='.$pageC.'&status='.$status,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);
        // json
        curl_close($curl);

        $response = json_decode($response, true);
        // dd($response);
        $data = $response['data'];
        $pages = ceil($response['row_count'] / $response['offset']);
        $page = array();
        for($i = 1; $i <= $pages; $i++){
            $page[] = $i;
        }

        return view('academy.my-course', [
            "title" => "Master Class",
            "data" => $data,
            "search" => $search,
            "sort" => $sort,
            "page" => $page,
            "status" => $status,
            "pageC" => $pageC
        ]);
        }
        // OJT
        if($sort == 'ojt'){
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $token = "JWT ".session()->get('token');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_customer_course?is_free=1&is_ojt=1&q='.$search.'&page='.$pageC.'&status='.$status,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);
        // json
        curl_close($curl);

        $response = json_decode($response, true);
        $data = $response['data'];
        $pages = ceil($response['row_count'] / $response['offset']);
        $page = array();
        for($i = 1; $i <= $pages; $i++){
            $page[] = $i;
        }
        // dd($response);

        return view('academy.my-course', [
            "title" => "Master Class + OJT",
            "data" => $data,
            "search" => $search,
            "sort" => $sort,
            "page" => $page,
            "status" => $status,
            "pageC" => $pageC
        ]);

        }
        // Learning path
        if($sort == 'lpath'){
            $token = "JWT ".session()->get('token');
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/customer_learning_path/get_customer_learning_path?q='.$search.'&page='.$pageC.'&status='.$status,
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

            // json
            $response = json_decode($response, true);
            // dd($response);
            $data = $response['data'];
            // dd($response);
            $pages = ceil($response['row_count'] / $response['offset']);
            $page = array();
            for($i = 1; $i <= $pages; $i++){
                $page[] = $i;
            }
            $response = $response['data'];
            // dd($response);

            return view('academy.my-course', [
                "title" => "Learning Path",
                "lpath" => $data,
                "search" => $search,
                "sort" => $sort,
                "page" => $page,
                "status" => $status,
                "pageC" => $pageC
            ]);
        }
    }

    public function syllabus($id){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        // dd($id);
        // if session()->get('token') is null return redirect to login
        if(session()->get('token') == null){
            return redirect('/login');
        }
        $token = "JWT ".session()->get('token');
        // Customer Course
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_customer_course?id_customer_course='.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $c_info = curl_exec($curl);

        curl_close($curl);
        // json
        $c_info = json_decode($c_info, true);
        $course_info = $c_info['data'];
        // dd($course_info);
        if($course_info == null){
            return redirect('/my-course');
        }
        // dd($c_info);

        // $course = only status 1
        // $course_info = [];
        // foreach ($c_info as $key => $value) {
        //     if ($value['status'] == 1) {
        //         array_push($course_info, $value);
        //     }
        //     if ($value['status'] == 2) {
        //         array_push($course_info, $value);
        //     }
        // }
        // end course_info

        // dd($course_info);
        // get session token

        // dd($token);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_customer_syllabus_all?id_customer_course='.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $syllabus = curl_exec($curl);

        curl_close($curl);
        // json
        $syllabus = json_decode($syllabus, true);

        $syllabus = $syllabus['data'];
        // dd($syllabus);
        $pass_ta = true;
        foreach ($syllabus as $key) {
            if ($key['status'] != 2) {
                $pass_ta = false;
            }
        }

        $id_course = $course_info[0]['id_course'];

        // discussion
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://gate.bisaai.id/bisa_design_prod/course/get_discuss?id_course=$id_course&is_aktif=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $discuss = curl_exec($curl);

        curl_close($curl);
        // json
        $discuss = json_decode($discuss, true);
        $discuss = $discuss['data'];
        // dd($discuss);
        // dd($pass_ta);
        if($pass_ta == true){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'academy/update_customer_course',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>'{
                "id_customer_course": "'.$id.'",
                "start_task" : 1
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: '.$token.''
            ),
            ));

            $active_final = curl_exec($curl);

            curl_close($curl);

            // $active_final = json_decode($active_final, true);
        }

        // certificate
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_my_sertifikat?id_customer_course='.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $certificate = curl_exec($curl);
        curl_close($curl);
        $certificate = json_decode($certificate, true);
        $certificate = $certificate['data'][0];
        // dd($certificate);

        // get testimoninal

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/academy/get_customer_testimoni_and_rating?id_customer_course='.$id,
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

        $testimoni = curl_exec($curl);

        curl_close($curl);

        $testimoni = json_decode($testimoni, true);
        $testimoni = $testimoni['data'][0];
        // dd($testimoni);

        return view('academy.syllabus', [
            "title" => "Syllabus",
            "syllabus" => $syllabus,
            "course_info" => $course_info,
            "pass_ta" => $pass_ta,
            "sertif" => $certificate,
            "discuss" => $discuss,
            "testimoni" => $testimoni
            // "active_final" => $active_final
        ]);
    }

    public function syllabusDetail($syllabus_id){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $token = "JWT ".session()->get('token');

        // syllabus all
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_customer_syllabus?id_customer_syllabus='.$syllabus_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // json
        $response = json_decode($response, true);

        $syllabusDetail = $response['data'];
        // dd($syllabusDetail);

        // dd($syllabusDetail);
        // error when syllabusDetail is empty
        // if(empty($syllabusDetail)){
        //     return redirect('/my-course/syllabus/'.$course_id)->with('syllabusnotfound', 'Data syllabus tidak ditemukan');
        // }

        // SYLLABUS QUIZ
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'course/get_syllabus_quiz?id_customer_syllabus='.$syllabus_id.'&is_start=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $quizs = curl_exec($curl);

        curl_close($curl);

        $quizs = json_decode($quizs, true);
        $quizs = $quizs['data'];
        shuffle($quizs);
        if (isset($quizs[0])){
            return view('academy.syllabus-detail', [
                "title" => "Syllabus Detail",
                "data" => $syllabusDetail,
                "syllabus_id" => $syllabus_id,
                "quiz" => $quizs
            ]);
        }else{
            return view('academy.syllabus-detail', [
                "title" => "Syllabus Detail",
                "data" => $syllabusDetail,
                "syllabus_id" => $syllabus_id,
                "quiz" => null
            ]);
        }

    }

    public function syllabusDetailOJT($syllabus_id){
        if(!session()->get('token')){
            return redirect('/login');
        }
        // dd($syllabus_id);
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        $token = "JWT ".session()->get('token');

        // syllabus all
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/get_customer_syllabus?id_customer_syllabus='.$syllabus_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // json
        $response = json_decode($response, true);
        if(empty($response['data'])){
            return redirect('/my-course');
        }
        $syllabusDetail = $response['data'][0];
        return view('academy.detail-task-ojt', [
            "title" => "Detail Task OJT",
            "silabus" => $syllabusDetail
        ]);
    }

    public function quiz(Request $request, $syllabus_id){
        if(!session()->get('token')){
            return redirect('/login');
        }
        // dd($syllabus_id);
        // dd($request->all());
        $id_customer_course = $request->syllabus_id;
        // $answer = $request->all();
        // dd($answer);

        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        // dd($syllabus_id);

        // dd($course_id);
        $token = "JWT ".session()->get('token');
        // dd($syllabus_id);


        // SYLLABUS QUIZ
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'course/get_syllabus_quiz?id_customer_syllabus='.$syllabus_id.'&is_start=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $quizs = curl_exec($curl);

        curl_close($curl);

        $quizs = json_decode($quizs, true);
        // dd($quizs);
        $quizs = $quizs['data'];

        // dd($quizs);
        // ----------------------------------------------------------

        // Quiz Id --------------------------------------------------
        $quiz_id = [];
        foreach ($quizs as $key) {
            $id_quiz= "quiz_id_".$key['id_quiz'];
            array_push($quiz_id, $request->$id_quiz);
        }
        // dd($quiz_id);

        // Answer ---------------------------------------------------
        $answers = [];
        foreach ($quizs as $key) {
            $answer = $key['id_quiz']."_answer";
            array_push($answers, $request->$answer);
        }

        // dd($answers, $quiz_id);
        // looping quiz_id and answer until length of quiz_id
        $quiz_answer = [];
        for ($i=0; $i < count($quiz_id); $i++) {
            $quiz_answer[$i] = [
                'id_quiz' => $quiz_id[$i],
                'answer_key' => $answers[$i]
            ];
        }
        // dd(json_encode($quiz_answer));
        // dd($quiz_answer);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/insert_customer_syllabus_quiz',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "id_customer_syllabus":"'.$syllabus_id.'",
            "answers": '.json_encode($quiz_answer).'
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $quiz_res = curl_exec($curl);

        curl_close($curl);
        // dd($quiz_res);

        $quiz_res = json_decode($quiz_res, true);
        // $quiz_res = array_push($quiz_res, $syllabus_id);

        // dd($quiz_res);
        if($quiz_res['score'] < 70){
            return redirect('/my-course/syllabus/'.$id_customer_course)->with('scoreFail', "Maaaf, anda belum lulus score anda: $quiz_res[score]");
        }else{
            return redirect('/my-course/syllabus/'.$id_customer_course)->with('scoreLulus', "Anda lulus dengan score $quiz_res[score]");
        }
        // return redirect('/my-course/syllabus/'.$id_customer_course)->with('score', "Score anda $quiz_res[score]");
    }

    public function finalTask(Request $request, $syllabus_id){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $url = 'https://gate.bisaai.id/bisa_design_prod/';
        // dd($syllabus_id);
        // get course_id from session
        $course_id = session()->get('course_id');
        // dd($course_id);
        $token = "JWT ".session()->get('token');
        // dd($syllabus_id);
        $data = $request->all();

        // data to send
        $id_customer_course = $data['id_customer_course'];
        $file = $data['file64'];
        $file_name = $data['file_name'];
        $deskripsi = $data['deskripsi'];
        // $active_final = $data['active_final'];
        // dd($deskripsi, $id_customer_course, $file, $file_name);
        // dd($active_final);
        // dd($file);
        // $file to base64
        // remove begining base64
        $file = substr($file, strpos($file, ",")+1);
        // dd($file);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'academy/update_customer_course',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "id_customer_course": "'.$id_customer_course.'",
            "task_description" : "'.$deskripsi.'",
            "file_name" : "'.$file_name.'",
            "task_final" : "'.$file.'"
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
        // dd($file_name, $deskripsi, $response, $file);
        // return redirect back
        return redirect('/my-course/syllabus/'.$syllabus_id)->with('success', 'Berhasil submit tugas akhir');
        // return back redirect back
    }

    public function startSyllabusOJT(Request $request){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $token = "JWT ".session()->get('token');
        $id_customer_syllabus = $request->id_customer_syllabus;
        // dd($id_customer_syllabus);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/academy/update_customer_syllabus',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "id_customer_syllabus":"'.$id_customer_syllabus.'",
            "start_time_task": "1"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);
        // dd($response);

        return redirect('/my-course/syllabus/detail-task/'.$id_customer_syllabus);
    }

    public function syllabusTaskOJT(Request $request, $syllabus_id){
        if(!session()->get('token')){
            return redirect('/login');
        }
        // dd($request->all(), $syllabus_id);
        $token = "JWT ".session()->get('token');
        $id_customer_syllabus = $request->id_customer_syllabus;
        $id_customer_course = $request->id_customer_course;
        $file = $request->file64;
        // remove all type of file of begining base64
        $file = substr($file, strpos($file, ",")+1);
        $file_name = $request->file_name;
        $deskripsi = $request->deskripsi;

        // dd($id_customer_syllabus, $file, $file_name, $deskripsi, $token);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/academy/update_customer_syllabus',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "id_customer_syllabus": "'.$id_customer_syllabus.'",
            "task_file" : "'.$file.'",
            "file_name": "'.$file_name.'",
            "task_description":"'.$deskripsi.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$token.''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // $response = json_decode($response, true);
        return redirect('/my-course/syllabus/'.$id_customer_course);
        // if($response['status_code'] == 200){
        // }else{
        //     return redirect('/my-course/syllabus/'.$id_customer_course);
        // }
    }

    public function rating(Request $request){
        if(!session()->get('token')){
            return redirect('/login');
        }
        $token = "JWT ".session()->get('token');
        // dd($request->all());

        $id_customer_course = $request->id_customer_course;
        $rating = $request->rating;
        $testimoni = $request->testimoni;

        // dd($id_customer_course, $rating, $testimoni);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://gate.bisaai.id/bisa_design_prod/academy/insert_testimoni_and_rating',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "id_customer_course" : "'.$id_customer_course.'",
            "rating" : "'.$rating.'",
            "testimonial" : "'.$testimoni.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$token.'',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // to json
        $response = json_decode($response, true);

        // dd($response);

        if($response['status_code'] == 400){
            // return redirect('/my-course/syllabus/'.$id_customer_course);
            return back()->with('errorRating', $response['description']);
        }else{
            // return redirect('/my-course/syllabus/'.$id_customer_course);
            return back()->with('successRating', 'Rating berhasil ditambahkan');
        }
    }
}
