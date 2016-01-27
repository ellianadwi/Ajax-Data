<?php

Route::get('/', function () {
    return view('partials.home');
});

Route::get('/', function () {
    return view('partials.makanan');
});

Route::get('/create-makanan', function () {
    return view('partials.makanan.create');
});

Route::get('makanan', 'MakananController@index');

Route::get('detail-makanan/{id}', 'MakananController@detail');

Route::get('edit-makanan/{id}', 'MakananController@edit');

Route::post('makanans', 'MakananController@store');

Route::put('edit-makanan/{id}', 'MakananController@update');

Route::get('hapus-makanan/{id}', 'MakananController@destroy');

