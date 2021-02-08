<?php

Route::get('/setup', 'MrTea\Concierge\Http\Controllers\SetupController@index')->name('setup');
Route::post('/setup', 'MrTea\Concierge\Http\Controllers\SetupController@create')->name('setup.create');
Route::get('/setup-completed', 'MrTea\Concierge\Http\Controllers\SetupController@completed')->name('setup.completed');

Route::get('/', MrTea\Concierge\Http\Livewire\Authentication::class)->middleware('redirectIfAuth')->name('authenticate');
Route::middleware('isAuth')->group(function(){
	Route::get('/dashboard', MrTea\Concierge\Http\Livewire\Dashboard::class)->name('dashboard');
});


// Route::get('/reset-password', function(){
// 	return "This is the reset password page";
// });


// Route::get('/profile', function(){
// 	return "This is the profile page";
// });