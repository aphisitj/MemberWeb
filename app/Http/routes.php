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
  
  // Route::get('place', function () { return view('backend.place.index'); });
  // Route::get('place/update', function () { return view('backend.place.update'); });
  // Route::get('/listuser', function () { return view('backend.listuser.index'); });
  // Route::get('/listuser/update', function () { return view('backend.listuser.update'); });
  
   //Route::get('/place/detail', function () { return view('backend.place.show'); });
    
    Route::resource('listuser','Backend\AdminUserController');
    Route::resource('place','Backend\AdminPlaceController');
    Route::resource('/','Backend\AdminhomeController');
    //Route::get('/', function () { return view('backend.index'); });
    Route::resource('user-management','Backend\AdminController');
    Route::resource('role','Backend\AdminRoleController');
    Route::resource('page','Backend\AdminPageController');
    Route::resource('create-place','Backend\DefaultController');
    Route::post('check-username','Backend\CheckUsernameController@checkuser');
  
  
});
/* --------------------- Host ------------------- */
// Route::group(['prefix' => '_host'], function () {
    Route::get('_host/forget', function () { return view('host.Forget'); });
    Route::controller('_host/login','Backend\HostLoginController');
    Route::get('_host/logout', 'Backend\HostLoginController@logout');
// });
Route::group(['middleware'=>'host'], function () {
    Route::get('_host/department', function () { return view('host.department.index'); });
    Route::get('_host/department/update', function () { return view('host.department.update'); });
    Route::get('_host/department/create', function () { return view('host.department.create'); });


    Route::get('_host/package', function () { return view('host.package.index'); });
    Route::get('_host/package/create', function () { return view('host.package.create'); });
    Route::get('_host/package/update', function () { return view('host.package.update'); });

    Route::get('_host/payment', function () { return view('host.payment.index'); });
  
    Route::get('_host/orders', function () { return view('host.orders.index'); });

    // Route::get('_host', function () { return view('host.profile.index'); });
    Route::get('_host/update', function () { return view('host.profile.update'); });
    Route::get('_host', function () { return view('host.profile.index'); });

    Route::get('_host/voucher/update', function () { return view('host.voucher.update'); });
    Route::get('_host/voucher/create', function () { return view('host.voucher.create'); });
    Route::get('_host/voucher', function () { return view('host.voucher.index'); });

    //Route::resource('_host/voucher','Backend\PlaceVoucherController');
    //Route::resource('_host','Backend\ProfileHostController');


    
    


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
