<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LearningPathController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\MySertifController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::view('URI', 'viewName');

// Home
Route::get('/', [HomeController::class, 'index']);


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'auth']);

// Logout
Route::get('/logout', [LoginController::class, 'logout']);


// Register
Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);


// Forget Pass
Route::get('/forgot-pass', [LoginController::class, 'forgetPass']);

Route::post('/forgot-pass', [LoginController::class, 'newPass']);


Route::view('news-detail', 'news-detail', [
    "title" => "News Detail"
]);

Route::view('about', 'about', [
    "title" => "About"
]);

// ============================Course=============================
Route::get('/course/all_course/1', [CourseController::class, 'free']) -> name('freeCourse');

Route::get('/course/all_course/3', [CourseController::class, 'premium']);

Route::get('/course/all_course/5', [CourseController::class, 'ojt']);

// Detail Course
Route::get('/course/detail/{id}/1', [CourseController::class, 'detail']);

Route::get('/course/detail/{id}/3', [CourseController::class, 'detail']);

Route::get('/course/detail/{id}/5', [CourseController::class, 'detail']);

// checkout enroll
Route::get('/course/pembelian/{slug}', [CourseController::class, 'checkout']);

Route::post('/course/pembelian/{slug}', [CourseController::class, 'enroll']);

Route::post('/course/pembelian/{slug}/paid', [CourseController::class, 'enrollPaid']);

// Course Transaction History
Route::get('/transaction', [CourseController::class, 'transaction']);

Route::post('/transaction', [CourseController::class, 'searchTransaction']);

// Course Upload Bukti Transaksi
Route::post('/transaction/bukti/{id}', [CourseController::class, 'updateTransaction']);

// Course Bayar Ulang
Route::post('/transaction/bayar-ulang/{id}', [CourseController::class, 'bayarUlang']);

Route::view('course-progress', 'course.course-progress');

// =================================End Course===========================

// ===================================Akademi===========================
Route::get('my-course', [AcademyController::class, 'myCourse']);

Route::post('my-course', [AcademyController::class, 'searchMyCourse']);

// Syllabus
Route::get('my-course/syllabus/{id}', [AcademyController::class, 'syllabus'])->name('syllabus');

Route::post('my-course/syllabus/{id}', [AcademyController::class, 'finalTask']); //Final Task

Route::post('my-course/syllabus/{id}/rating', [AcademyController::class, 'rating']); //Rating

Route::get('my-course/syllabus/detail/{syllabus_id}', [AcademyController::class, 'syllabusDetail'])->name('syllabusDetail');

Route::post('my-course/syllabus/detail/{syllabus_id}', [AcademyController::class, 'quiz']);

// OJT
Route::get('my-course/syllabus/detail-task/{syllabus_id}', [AcademyController::class, 'syllabusDetailOJT']);

Route::post('my-course/syllabus/{syllabus_id}/start-syllabusOJT', [AcademyController::class, 'startSyllabusOJT']);

Route::post('my-course/syllabus/detail-task/{syllabus_id}', [AcademyController::class, 'syllabusTaskOJT']);

// ======================================End Akademi===========================


// ======================================User===========================
Route::get('user', [UserController::class, 'index']);

Route::post('user', [UserController::class, 'update']);

// ======================================End User===========================

// ======================================My Sertifikat===========================
Route::get('my-certificate', [MySertifController::class, 'index']);
// ======================================End My Sertifikat===========================

// ======================================Flashsale===========================
Route::view('flashsale', 'course.course-flashsale', [
    "title" => "Flashsale"
]);

// ======================================End Flashsale===========================


// ======================================Learning Path===========================
Route::get('learningpath', [LearningPathController::class, 'index']);

Route::get('learningpath/detail/{id}', [LearningPathController::class, 'detail']);

Route::post('learning-path/{id}/', [LearningPathController::class, 'enroll']);

Route::get('my-learning-path/{id}', [LearningPathController::class, 'myLpath']);
// ======================================End Learning Path===========================

// Certification
Route::get('certification', [CertificationController::class, 'international']);

Route::get('certification/industry', [CertificationController::class, 'national']);

Route::get('certification/detail/{id}', [CertificationController::class, 'sertifdetail']);

Route::post('certification/detail/{id}/enroll', [CertificationController::class, 'checkout']); //buy certification

Route::post('certification/detail/{id}/enrollFree', [CertificationController::class, 'checkoutFree']); //buy certification

Route::get('my-certification', [CertificationController::class, 'myCertification']);

Route::get('certification/{id}', [CertificationController::class, 'certification']);

Route::post('/transaction/bayar-ulang/sertifikasi/{id}', [CertificationController::class, 'bayarUlang']);

// Route::view('test', 'testapi');



// Silabus
Route::view('silabus-test', 'silabus-test');

Route::view('store', 'store');

Route::view('prakerja', 'prakerja');

Route::view('kampusmerdeka', 'kampusmerdeka');

// Portfolio
Route::get('portofolio', [PortfolioController::class, 'index']);

Route::get('portofolio/detail/{id}', [PortfolioController::class, 'detail']);

Route::get('my-portfolio', [PortfolioController::class, 'myPortfolio']);

Route::post('my-portfolio', [PortfolioController::class, 'submit'])->name('submitPortfolio');

Route::get('my-portfolio/{id}', [PortfolioController::class, 'myDetailPorto']);

Route::post('my-portfolio/{id}', [PortfolioController::class, 'edit']);

Route::post('portfolio/{id}/like', [PortfolioController::class, 'like']);

Route::post('portfolio/{id}/dislike', [PortfolioController::class, 'dislike']);


// testimoni
Route::get('testimonial', [TestimoniController::class, 'index']);
