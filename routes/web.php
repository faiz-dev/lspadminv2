<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@index');


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');


Route::group(['middleware'=>['guest']], function(){

    // MEMBER AUTH
    Route::group(['prefix'=>'memberauth'], function(){
        Route::get('/', 'Auth\LoginController@memberShowLogin')->name('member-show-login');
        Route::post('/', 'Auth\LoginController@memberActionLogin')->name('member-action-login');
        Route::get('/reset', 'Auth\LoginController@memberShowLogin')->name('member-show-reset');
        Route::post('/reset', 'Auth\LoginController@memberActionReset')->name('member-action-reset');
    });

    // SECRET AUTH
    Route::group(['prefix'=>'secret'], function() {
        Route::get('/', 'Auth\LoginController@adminShowLogin')->name('admin-show-login');
        Route::post('/', 'Auth\LoginController@adminActionLogin')->name('admin-action-login');
        Route::get('/reset', 'Auth\LoginController@adminShowReset')->name('admin-show-reset');
        Route::post('/reset', 'Auth\LoginController@adminActionReset')->name('admin-action-reset');
    });

});

// AUTHORIZED ACCESS
Route::group(['middleware'=>['role:Super Admin|Asesor|Admin Jejaring'],'prefix'=>'/m'], function() {
    Route::get('/','Admin\MainController@index');

    Route::group(['prefix'=>'/pengaturan'], function() {                
        Route::resource('permission', 'Pengaturan\PermissionsManController')->middleware('permission:permission-manager');
        Route::post('role/{role}/revoke','Pengaturan\RoleManController@revokePermission')->middleware('permission:role-manager');
        Route::resource('role', 'Pengaturan\RoleManController')->middleware('permission:role-manager');


        Route::group(['middleware' => ['permission:user-manager'],'prefix'=>'/member'], function() {
            Route::get('/asesi', 'Pengaturan\MemberManController@asesiPanel')->name('pengaturan.member.asesi');
            Route::get('/asesi/fetch', 'Pengaturan\MemberManController@fetchMember')->name('pengaturan.member.asesi.fetch');
            Route::get('/asesi/create', 'Pengaturan\MemberManController@createAsesi')->name('pengaturan.member.asesi.create');
        });

    });
});


Route::group(['middleware'=>['auth']], function(){
    Route::get('/keluar','Auth\LoginController@logout');
});
// Auth::routes();

// PORTAL ROUTES
Route::get('/', 'Portal\HomeController@index')->name('home');
Route::get('/contactus', 'Portal\HomeController@contactus')->name('contactus');
Route::get('/download', 'Portal\HomeController@download')->name('download');

