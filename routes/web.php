<?php

use App\Models\Transactiondeliverie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PusatController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PricelistController;
use App\Http\Controllers\PrintResiController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\PerwakilanController;
use App\Http\Controllers\UserCourierController;
use App\Http\Controllers\SearchRegenciesController;
use App\Http\Controllers\TransactionCourierComplete;
use App\Http\Controllers\CaptchaValidationController;
use App\Http\Controllers\CenterOfExcellentController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\IndikatorMutu;
use App\Http\Controllers\IndikatorMutuController;
use App\Http\Controllers\KeluhanPasienController;
use App\Http\Controllers\MaternalInformationController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RevenueInformationController;
use App\Http\Controllers\TausiyahController;
use App\Http\Controllers\TransactionTransitController;
use App\Http\Controllers\TransactionDeliveryController;
use App\Http\Controllers\TransactionTransitPusatController;
use App\Http\Controllers\TransactionDeliveryKurirController;
use App\Http\Controllers\TransactionCourierCompleteController;
use App\Http\Controllers\TransaksiIndikatorMutuController;
use Illuminate\Routing\PendingResourceRegistration;

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
 

// Route::get('/', 'App\Http\Controllers\AuthController@index')->name('login');
Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');

Route::get('register', function () {
    return view('login.register');
});
Route::get('/', function () {
    return view('login.login');
});
 
Route::get('verify', function () {
    return view('verify.verify');
});
Route::post('proses_register', [RegisterController::class, 'store'])->name('proses_register');
Route::get('registersuccess', function () {
    return view('login.registersuccess');
});

Route::get('verificationregistration/{id}', [RegisterController::class, 'show']);

Route::post('sendverification', [RegisterController::class, 'edit']);

Route::post('getRegistrationMitraKurirByIDJson', [MasterDataController::class, 'getRegistrationMitraKurirByIDJson'])->name('getRegistrationMitraKurirByIDJson');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
    
    Mail::to('muchsin.abdillah@gmail.com')->send(new \App\Mail\RegisterMail($details));

    dd("Email is Sent.");
});

Route::get('contact-form-captcha', [CaptchaValidationController::class, 'index']);
Route::post('captcha-validation', [CaptchaValidationController::class, 'capthcaFormValidate']);
Route::get('reload-captcha', [CaptchaValidationController::class, 'reloadCaptcha']);

// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register'); 

Route::post('proses_login', [AuthController::class, 'proses_login']);
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    
    
      

    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', AdminController::class); 

        
        //user-login
        Route::resource('dashboard/userlogin', UserController::class);
        Route::get('dashboard/userlogin/create', [UserController::class, 'create']);
        Route::post('dashboard/userlogin/insert', [UserController::class, 'store']);
        Route::get('dashboard/userlogin/view/{id}', [UserController::class, 'show']);
        Route::post('dashboard/userlogin/update', [UserController::class, 'update']);

        // Register Verification
        Route::get('dashboard/verification', [RegisterController::class, 'index']);
        Route::get('dashboard/verificationFinish', [RegisterController::class, 'history']);
        Route::post('dashboard/Confirmation', [RegisterController::class, 'create']);
        Route::post('dashboard/Finished', [RegisterController::class, 'update']);

        // Data Master Indikator Mutu
        Route::get('dashboard/indikatormutu', [IndikatorMutuController::class, 'index']);
        Route::get('dashboard/indikatormutu/checkSlug', [IndikatorMutuController::class, 'checkSlug']);
        Route::get('dashboard/indikatormutu/create', [IndikatorMutuController::class, 'create']);
        Route::get('dashboard/indikatormutu/view/{id}', [IndikatorMutuController::class, 'show']);
        Route::post('dashboard/indikatormutu/prosesCreate', [IndikatorMutuController::class, 'store']);
        Route::post('dashboard/indikatormutu/prosesUpdate', [IndikatorMutuController::class, 'update']);

         // Transaksi Entri Indikator Mutu
         Route::get('dashboard/trsindikatormutu', [TransaksiIndikatorMutuController::class, 'index']);
         Route::get('dashboard/trsindikatormutu/checkSlug', [TransaksiIndikatorMutuController::class, 'checkSlug']);
         Route::get('dashboard/trsindikatormutu/create', [TransaksiIndikatorMutuController::class, 'create']);
         Route::get('dashboard/trsindikatormutu/view/{id}', [TransaksiIndikatorMutuController::class, 'show']);
         Route::post('dashboard/trsindikatormutu/prosesCreate', [TransaksiIndikatorMutuController::class, 'store']);
         Route::post('dashboard/trsindikatormutu/prosesUpdate', [TransaksiIndikatorMutuController::class, 'update']);
    });
    // route 
    // Route::group(['middleware' => ['cek_login:perwakilan']], function () {
    //     Route::resource('perwakilan', PerwakilanController::class);
    // }); 
 
});