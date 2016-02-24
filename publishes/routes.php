<?php

Route::group(['namespace' => 'Terranet\Contacts'], function () {
    Route::get('contact', [
        'as' => 'contacts',
        'uses' => 'ContactsController@index',
    ]);
});
