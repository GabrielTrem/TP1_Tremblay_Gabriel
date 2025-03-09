<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Resources\FilmResource;
use App\Http\Resources\CriticResource;

class FilmCriticController extends Controller
{
    public function index(string $film_id)
    {
        try{
            $film = Film::findOrFail($film_id);

            return response()->json([
                'film' => new FilmResource($film),
                'critics' => CriticResource::collection($film->critics)
            ], OK);
        }
        catch(QueryException $ex){
            abort(404, "Invalid Id");
        }
        catch(Exception $ex){
            abort(500, "Server error");

        }
    }

    public function averageScore(string $film_id)
    {
        try {
            $film = Film::findOrFail($film_id);
            $averageScore = round($film->critics()->avg('score'), 2);

            return response()->json([
                'film_id' => $film->id,
                'average_score' => $averageScore,
            ], OK);
        } 
        catch(QueryException $ex){
            abort(NOT_FOUND, "Not Found");
        }
        catch(Exception $ex){
            abort(SERVER_ERROR, "Server Error");
        }
    }
}
