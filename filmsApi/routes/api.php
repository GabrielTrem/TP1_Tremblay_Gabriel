<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('films', 'App\Http\Controllers\FilmController@index');
Route::get('films/{id}/actors', 'App\Http\Controllers\FilmActorController@show');
Route::get('films/{id}/critics', 'App\Http\Controllers\FilmCriticController@show');
Route::get('films/{id}/average-score', 'App\Http\Controllers\FilmCriticController@getAverageScore');
Route::get('films/search', 'App\Http\Controllers\FilmController@search');

Route::post('users', 'App\Http\Controllers\UserController@store');
Route::put('users/{id}', 'App\Http\Controllers\UserController@update');
Route::get('users/{id}/favorite-language', 'App\Http\Controllers\UserLanguageController@getFavoriteLanguage');

Route::destroy('critics/{id}', 'App\Http\Controllers\CriticController@destroy');

