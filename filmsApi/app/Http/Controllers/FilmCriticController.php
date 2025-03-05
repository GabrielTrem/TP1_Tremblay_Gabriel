<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmCriticController extends Controller
{
    public function index(string $film_id)
    {
        try{
            $film = Film::findOrFail($film_id);
            return FilmResource::collection($language->films()->paginate(10))->response()->setStatusCode(200);
        }
        catch(QueryException $ex){
            abort(404, "Invalid Id");
        }
        catch(Exception $ex){
            abort(500, "Server error");

        }
    }

    public function averageScore(Request $request)
    {
        //
    }
}
