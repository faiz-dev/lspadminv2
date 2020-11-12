<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ChckPwdExp;
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
Route::group(['middleware'=>['role:Super Manajer|Asesor|Manajer Jejaring'],'prefix'=>'/manager'], function() {
    Route::get('/','Admin\MainController@index');

    Route::group(['prefix'=>'/sertifikasi'], function() {
        // aplikasi
        Route::group(['prefix'=>'/aplikasi'], function() {
            Route::get('/', 'Sertifikasi\AplikasiController@index')->middleware('role:Super Manajer')->name('sertifikasi.aplikasi.index');
            Route::post('/data', 'Sertifikasi\AplikasiController@data')->middleware('role:Super Manajer')->name('sertifikasi.aplikasi.data');
            Route::get('/detail', 'Sertifikasi\AplikasiController@detail')->middleware('role:Super Manajer')->name('sertifikasi.aplikasi.detail');
            Route::put('/updateStatus', 'Sertifikasi\AplikasiController@updateStatus')->middleware('role:Super Manajer')->name('sertifikasi.aplikasi.update-status');
            Route::delete('/', 'Sertifikasi\AplikasiController@delete')->middleware('role:Super Manajer')->name('sertifikasi.aplikasi.delete');
        });
    });

    Route::group(['prefix'=>'/pengaturan'], function() {      
        // permission          
        Route::resource('permission', 'Pengaturan\PermissionsManController')->middleware('permission:permission-manager');
        Route::post('role/{role}/revoke','Pengaturan\RoleManController@revokePermission')->middleware('permission:role-manager');
        Route::resource('role', 'Pengaturan\RoleManController')->middleware('permission:role-manager');

        // user manager
        Route::group(['middleware' => ['permission:user-manager'],'prefix'=>'/member'], function() {
            Route::get('/asesi', 'Pengaturan\MemberManController@asesiPanel')->name('pengaturan.member.asesi');
            Route::post('/asesi/fetch', 'Pengaturan\MemberManController@fetchMember')->name('pengaturan.member.asesi.fetch');
            Route::get('/asesi/create', 'Pengaturan\MemberManController@createAsesi')->name('pengaturan.member.asesi.create');
            Route::get('/asesi/edit', 'Pengaturan\MemberManController@editAsesi')->name('pengaturan.member.asesi.edit');
            Route::put('/asesi/update-password', 'Pengaturan\MemberManController@updatePassword')->name('pengaturan.member.asesi.update-password');
        });

        // sekolah
        Route::group(['middleware' => ['permission:sekolah manager'],'prefix' => "/sekolahjejaring"], function(){
            Route::get('/sekolah', 'Pengaturan\JejaringManController@index')->name('pengaturan.sekolahjejaring.sekolah.index');
        });
    });

    Route::group(['prefix'=>'utils'], function() {
        // Resource Uji Kompetensi
        Route::get('/ujikom/get', "Utils\UjiKomUtils@getSafe")->name('utils.ujikom.get');
    });
});

// AUTHORIZED ACCESS ASESI
Route::group(['middleware' => ['role:Member',ChckPwdExp::class], 'prefix' => '/member'], function() {
    Route::get('/','Asesi\MainController@welcome')->name('asesi.welcome');
    
    // UJI KOMPETENSI
    Route::group(['prefix'=> '/ujikom'], function() {
        Route::get('/','Asesi\Asesmen\AplikasiController@index')->name('asesi.asesmen.index');    
        Route::get('/pendaftaran/list','Asesi\Asesmen\AplikasiController@listPendaftaran')->name('asesi.asesmen.list-pendaftaran');
        Route::get('/pendaftaran','Asesi\Asesmen\AplikasiController@pendaftaran')->name('asesi.asesmen.pendaftaran');
        Route::post('/pendaftaran','Asesi\Asesmen\AplikasiController@actionPendaftaran')->name('asesi.asesmen.action-pendaftaran');
        Route::get('/pendaftaran/detail','Asesi\Asesmen\AplikasiController@showPendaftaran')->name('asesi.asesmen.show-pendaftaran');
    });

    Route::group(['prefix'=> '/pengaturan'], function() {
        Route::get('/profil','Asesi\Pengaturan\ProfileController@index')->name('asesi.pengaturan.profil');
        Route::put('/profil','Asesi\Pengaturan\ProfileController@actionUpdate')->name('asesi.pengaturan.profil.update');
        Route::get('/profil/password-reset','Asesi\Pengaturan\ProfileController@showResetPassword')->name('asesi.pengaturan.profil.show-password-reset');
        Route::put('/profil/password-reset','Asesi\Pengaturan\ProfileController@actionResetPassword')->name('asesi.pengaturan.profil.action-password-reset');
    });
});


Route::group(['middleware'=>['auth']], function(){
    Route::post('/keluar','Auth\LoginController@logout')->name('logout');
});
// Auth::routes();

// PORTAL ROUTES
Route::get('/', function() {
    return redirect(route('member-show-login'));
})->name('home');
Route::get('/contactus', 'Portal\HomeController@contactus')->name('contactus');
Route::get('/download', 'Portal\HomeController@download')->name('download');

