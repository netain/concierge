<?php

Route::get('/setup', 'MrTea\Concierge\Http\Controllers\SetupController@index')->name('setup');
Route::post('/setup', 'MrTea\Concierge\Http\Controllers\SetupController@create')->name('setup.create');
Route::get('/setup-completed', 'MrTea\Concierge\Http\Controllers\SetupController@completed')->name('setup.completed');

Route::get('/', MrTea\Concierge\Http\Livewire\Authentication::class)->middleware('redirectIfAuth')->name('authenticate');
Route::get('/reset-password', 'MrTea\Concierge\Http\Controllers\ResetPasswordController@index')->name('reset.password');
Route::post('/reset-password', 'MrTea\Concierge\Http\Controllers\ResetPasswordController@resetPassword')->name('reset.password.update');

Route::middleware('isAuth')->group(function(){
	Route::post('/logout', 'MrTea\Concierge\Http\Controllers\LogoutController@index')->name('logout');
	Route::get('/profile', MrTea\Concierge\Http\Livewire\Profile::class)->name('profile');
	Route::get('/dashboard', MrTea\Concierge\Http\Livewire\Dashboard::class)->name('dashboard');
	Route::get('/administrators', MrTea\Concierge\Http\Livewire\Administrators::class)->name('administrators');
});