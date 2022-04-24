<?php

use Illuminate\Support\Facades\Route;


Route::get('/','ManagerController@index')->name('manager.dashboard');