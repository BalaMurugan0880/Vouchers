<?php

use Illuminate\Support\Facades\Route;
use App\companyregisters;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('voucherdetails', function () {
    return view('voucherdetails');
});

Route::get('addvoucher', function () {
    return view('addvoucher');
});

Route::get('displayVouchers', function () {
    return view('displayVouchers');
});

Route::get('adminhome', function () {
    return view('/admin/adminhome');
});

Route::get('travel', function () {
    return view('voucherCategory/travel');
});

Route::get('fashion', function () {
    return view('voucherCategory/fashion');
});


Route::get('healthNbeauty', function () {
    return view('voucherCategory/healthNbeauty');
});


Route::get('foodNbeverage', function () {
    return view('voucherCategory/foodNbeverage');
});

Route::get('registerVendor', function () {
    return view('auth/registerVendor');
});

Route::get('profile', function () {
    return view('auth/profile');
});

Route::get('activeVoucher', function () {
    return view('voucher/activeVoucher');
});

Route::get('expiredVoucher', function () {
    return view('voucher/expiredVoucher');
});

Route::get('vendorpanel', function () {
    return view('vendor/vendorpanel');
});

Route::get('payment', function () {
    return view('voucher/payment');
});

Route::get('invoice', function () {
    return view('invoice');
});





Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/home', 'companyregController@create')->name('home')->middleware('verified');
Route::post('/home', 'companyregController@store');

Route::get('/voucherdetails', 'voucherdetailsController@create')->middleware('verified','checkpost');
Route::post('/voucherdetails', 'voucherdetailsController@store');


Route::post('/registerVendor', 'registervendorController@store');

Route::get('/addvoucher', 'addvoucherController@create');
Route::post('/addvoucher', 'addvoucherController@store');

Route::get('/displayVouchers', 'vouchers\displayController@test_query');

Route::get('fashion', 'vouchers\fashionController@test_query')->middleware('verified');
Route::post('fashion', 'vouchers\fashionController@reedemVoucher');

Route::post('foodNbeverage', 'vouchers\foodNbeverageController@reedemVoucher');
Route::get('foodNbeverage', 'vouchers\foodNbeverageController@test_query')->middleware('verified');

Route::post('healthNbeauty', 'vouchers\healthNbeautyController@reedemVoucher');
Route::get('healthNbeauty', 'vouchers\healthNbeautyController@test_query')->middleware('verified');

Route::post('travel', 'vouchers\travelController@reedemVoucher');
Route::get('travel', 'vouchers\travelController@test_query')->middleware('verified');

Route::get('activeVoucher', 'vouchers\activevoucherController@test_query')->middleware('verified');
Route::post('activeVoucher', 'vouchers\activevoucherController@reedemVoucher')->middleware('verified');

Route::get('expiredVoucher', 'vouchers\expiredvoucherController@test_query')->middleware('verified');

Route::get('/adminhome', 'userdisplayController@user_table');
Route::get('approved/{id}', 'userdisplayController@approved')->name('approved');

Route::get('login/{provider}', 'Auth\LoginController@redirect');
Route::get('login/{provider}/callback', 'Auth\LoginController@Callback');

Route::get('profile','userController@create')->middleware('verified');
Route::post('profile','userController@update_avatar')->middleware('verified');

Route::get('/vendorpanel', 'vendorpanelController@addvoucher_table')->middleware('verified');
Route::post('/vendorpanel', 'vendorpanelController@store')->middleware('verified');

Route::get('package', 'PaymentController@index')->middleware('verified');
Route::post('charge', 'PaymentController@charge')->middleware('verified');
Route::get('paymentsuccess', 'PaymentController@payment_success')->middleware('verified');
Route::get('paymenterror', 'PaymentController@payment_error')->middleware('verified');
