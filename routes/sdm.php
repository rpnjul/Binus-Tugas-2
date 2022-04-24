<?php

use Illuminate\Support\Facades\Route;


Route::get('/','SdmController@index')->name('sdm.dashboard');