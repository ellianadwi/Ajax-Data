<?php

Route::get('/', function () {
    return view('partials.home');
});


Route::get('/create-makanan', function () {
    return view('partials.makanan.create');
});
Route::get('/create-minuman', function () {
    return view('partials.minuman.create');
});

Route::get('makanan', 'MakananController@index');

Route::get('makanan/{id}', 'MakananController@show');

Route::get('detail-makanan/{id}', 'MakananController@detail');

Route::get('edit-makanan/{id}', 'MakananController@edit');

Route::post('makanan', 'MakananController@store');

Route::put('makanan/{id}', 'MakananController@update');

Route::get('hapus-makanan/{id}', 'MakananController@destroy');

Route::get('/data-makanan','MakananController@getData');



Route::get('minuman', 'MinumanController@index');

Route::get('minuman/{id}', 'MinumanController@show');

Route::get('detail-minuman/{id}', 'MinumanController@detail');

Route::get('edit-minuman/{id}', 'MinumanController@edit');

Route::post('minumans', 'MinumanController@store');

Route::put('minuman/{id}', 'MinumanController@update');

Route::get('hapus-minuman/{id}', 'MinumanController@destroy');

Route::get('/data-minuman','MinumanController@getData');