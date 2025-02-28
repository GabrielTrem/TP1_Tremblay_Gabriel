<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        try{
            return FilmResource::collection(Film::all())->response()->setStatusCode(OK);
        }
        catch(Exception $e){
            abort(SERVER_ERROR, 'Server Error');
        }
    }

    public function search(Request $request)
    {
        try{
            return FilmResource::collection(Film::all())->response()->setStatusCode(OK);
        }
        catch(Exception $e){
            abort(SERVER_ERROR, 'Server Error');
        }
    }
}
