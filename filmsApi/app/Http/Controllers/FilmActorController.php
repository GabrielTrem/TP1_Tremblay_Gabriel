<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Http\Resources\ActorResource;

class FilmActorController extends Controller
{
    public function index(string $film_id)
    {
        try{
            $film = Film::findOrFail($film_id);
            return ActorResource::collection($film->actors)->response()->setStatusCode(200);
        }
        catch(QueryException $ex){
            abort(404, "Invalid Id");
        }
        catch(Exception $ex){
            abort(500, "Server Error");

        }
    }
}
