<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('films', 'App\Http\Controllers\FilmController@index');
Route::get('films/search', 'App\Http\Controllers\FilmController@search');

Route::get('films/{id}/actors', 'App\Http\Controllers\FilmActorController@index');
Route::get('films/{id}/critics', 'App\Http\Controllers\FilmCriticController@index');
Route::get('films/{id}/average-score', 'App\Http\Controllers\FilmCriticController@averageScore');

Route::post('users', 'App\Http\Controllers\UserController@store');
Route::put('users/{id}', 'App\Http\Controllers\UserController@update');
// Route::get('users/{id}/favorite-language', 'App\Http\Controllers\UserLanguageController@favoriteLanguage');

Route::delete('critics/{id}', 'App\Http\Controllers\CriticController@destroy');

