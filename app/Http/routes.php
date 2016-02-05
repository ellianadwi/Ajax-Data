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
Route::get('/create-paket', function () {
    return view('partials.paket.create');
});

Route::get('makanan', 'MakananController@index');

Route::get('makanan/{id}', 'MakananController@show');

Route::get('detail-makanan/{id}', 'MakananController@detail');

Route::get('edit-makanan/{id}', 'MakananController@edit');

Route::post('makanan', 'MakananController@store');

Route::put('makanan/{id}', 'MakananController@update');

Route::delete('hapus-makanan/{id}', 'MakananController@destroy');

Route::get('/data-makanan','MakananController@getData');



Route::get('minuman', 'MinumanController@index');

Route::get('minuman/{id}', 'MinumanController@show');

Route::get('detail-minuman/{id}', 'MinumanController@detail');

Route::get('edit-minuman/{id}', 'MinumanController@edit');

Route::post('minuman', 'MinumanController@store');

Route::put('minuman/{id}', 'MinumanController@update');

Route::delete('hapus-minuman/{id}', 'MinumanController@destroy');

Route::get('/data-minuman','MinumanController@getData');


Route::get('paket', 'PaketController@index');

Route::get('paket/{id}', 'PaketController@show');

Route::get('detail-paket/{id}', 'PaketController@detail');

Route::get('edit-paket/{id}', 'PaketController@edit');

Route::post('paket', 'PaketController@store');

Route::put('paket/{id}', 'PaketController@update');

Route::delete('hapus-paket/{id}', 'PaketController@destroy');

Route::get('/data-paket','PaketController@getData');