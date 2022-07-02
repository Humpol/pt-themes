<?php

use Illuminate\Support\Facades\Route;
use Pterodactyl\Http\Middleware\Admin\Servers\ServerInstalled;

Route::get('/', 'BaseController@index')->name('admin.index');


/*
|--------------------------------------------------------------------------
| Unix Controller Routes
|--------------------------------------------------------------------------
|
| Endpoint: /admin/unix
|
*/
Route::group(['prefix' => 'unix'], function () {
	Route::get('/', 'Unix\UnixController@index')->name('admin.unix');
	Route::get('/unix/index', 'Unix\UnixController@index')->name('admin.unix.index');

	Route::get('/updates', 'Unix\UpdateController@index')->name('admin.unix.update');

	Route::get('/support', 'Unix\SupportController@index')->name('admin.unix.support');

	Route::get('/alerts', 'Unix\AlertsController@index')->name('admin.unix.alerts');

	Route::get('/login-page', 'Unix\LoginController@index')->name('admin.unix.login');

	Route::get('/meta', 'Unix\MetaController@index')->name('admin.unix.meta');

	Route::get('/advanced', 'Unix\AdvancedController@index')->name('admin.unix.advanced');

	Route::get('/connectivity', 'Unix\ConnectController@index')->name('admin.unix.connect');

	Route::get('/background', 'Unix\BackgroundController@index')->name('admin.unix.background');


	Route::post('/setting', 'Unix\UnixSettingController@settingSubmit')->name('admin.unix.setting');

	Route::get('/mail', 'Unix\MailUserController@index')->name('admin.mail');
	Route::post('/mail/send', 'Unix\MailUserController@send')->name('admin.mail.send');
});
