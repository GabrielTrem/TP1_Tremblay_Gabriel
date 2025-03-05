<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FilmResource;
use App\Models\Film;

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

    public function search(Request $request) //inspirer de https://laracasts.com/discuss/channels/laravel/optional-where-statement-in-sql-query et https://laravel.com/docs/master/requests#main-content
    {
        try{
            $films = Film::query();
            
            if($request->filled('keyword')){
                $films->where('title', 'like', '%' . $request->query('keyword') . '%');
            }
            if($request->filled('rating')){
                $films->where('rating', '=', $request->query('rating'));
            }
            if($request->filled('minLength')){
                $films->where('length', '>=', $request->query('minLength'));
            }
            if($request->filled('maxLength')){
                $films->where('length', '<=', $request->query('maxLength'));
            }

            return FilmResource::collection($films->paginate(PAGINATION))->response()->setStatusCode(OK);
        }
        catch(Exception $e){
            abort(SERVER_ERROR, 'Server Error');
        }
    }
}
