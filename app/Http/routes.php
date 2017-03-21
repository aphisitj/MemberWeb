<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('lang/{lang}',[
    'as'=>'lang',
    'uses'=>'Frontend\LocaleController@lang'
]);

Route::get('/', [
  'as' => 'home',
  function () {
    return view('frontend.index');
  }
]);

/* --------------------- Admin ------------------- */
Route::group(['prefix' => '_admin'], function () {
    Route::controller('login', 'Backend\LoginController');
    Route::get('logout', 'Backend\LoginController@logout');
});
Route::group(['middleware'=>'admin','prefix' => config()->get('constants.BO_NAME')], function () {
  
  
    Route::resource('listuser','Backend\AdminRoleController');
    Route::resource('listuser','Backend\AdminUserController');
    Route::resource('listuser/order','Backend\AdminOrderDetailController');  
    Route::resource('placetype','Backend\AdminPlaceTypeController');   
    Route::resource('place','Backend\AdminPlaceController');
    Route::resource('place/voucher','Backend\AdminPackageDetailController');
    Route::resource('/','Backend\AdminhomeController');    
    Route::resource('user-management','Backend\AdminController');
    Route::resource('role','Backend\AdminRoleController');
    Route::resource('page','Backend\AdminPageController');
    Route::resource('create-place','Backend\DefaultController');
    Route::post('check-username','Backend\CheckUsernameController@checkuser');
  //Route::get('/', function () { return view('backend.index'); });
  
});
/* --------------------- Host ------------------- */
 //Route::group(['prefix' => '_host'], function () {
    Route::get('_host/forget', function () { return view('host.Forget'); });
    Route::controller('_host/login','Backend\HostLoginController');
    Route::get('_host/logout', 'Backend\HostLoginController@logout');
 //});
    Route::group(['middleware'=>'host'], function () {


    //Route::get('_host/inquiry', function () { return view('host.inquiry.index'); });
    Route::resource('_host/inquiry','Backend\HostInquiryController');
    Route::resource('_host/payment','Backend\HostPaymentController');
    Route::resource('_host/department','Backend\HostDepartmentController');
    Route::resource('_host/package','Backend\HostPackageController');
    Route::resource('_host/voucher','Backend\HostVoucherController');
    Route::resource('_host','Backend\ProfileHostController');

    Route::resource('_host/uploadimg','Backend\HostUploadImgController');
    
    


});
    
/* --------------------- API ------------------- */
Route::group(['prefix' => 'api'], function () {

});
/* --------------------- Theme ------------------- */
Route::group(['prefix' => '_theme'], function () {
    Route::get('/',function(){
        return view('backend.theme_component.blank');
    });
    Route::get('form',function(){
        return view('backend.theme_component.form');
    });
    Route::get('list',function(){
        return view('backend.theme_component.list');
    });
});
