<?php
Route::group(['prefix' => 'qbd-connector', 'namespace' => 'Iresci23\LaravelQbd'], function(){

	Route::any('/qbwc', 'LaravelQbdController@initQBWC');
	Route::get('/generate-qwc', 'LaravelQbdController@generateQWC');
	Route::get('/test', 'LaravelQbdController@testForm');
	Route::post('/test', 'LaravelQbdController@addCustomer')->name('Customer.add');

});