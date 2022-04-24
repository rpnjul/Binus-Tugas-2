<?php

use Illuminate\Support\Facades\Route;



Route::get('/','PegawaiController@index')->middleware('auth')->name('pegawai.dashboard');