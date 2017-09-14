<?php
use App\Mail\ContactMessageCreated;

Route::name('root_path')->get('/', 'PagesController@home');

Route::name('about_path')->get('/about', 'PagesController@about');

Route::name('contact_path')->get('/contact', 'ContactsController@create');

Route::name('contact_path')->post('/contact', 'ContactsController@store');

Route::get('/test-email', function () {
    return new ContactMessageCreated('Massimo', 'mass1g@hotmail.com', 'Test Laracarte');
});