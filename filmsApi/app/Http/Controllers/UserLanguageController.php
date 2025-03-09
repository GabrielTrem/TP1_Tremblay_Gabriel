<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\LanguageResource;

class UserLanguageController extends Controller
{
    //inspirer de https://stackoverflow.com/questions/13223512/how-to-select-count-with-laravels-fluent-query-builder
    public function favoriteLanguage(string $user_id)
    {
        try{
            $user = User::findOrFail($user_id);

            $favoriteLanguage = $user->critics()
            ->join('films', 'critics.film_id', '=', 'films.id') 
            ->select('films.language_id', DB::raw('COUNT(*) as languageCount'))
            ->groupBy('films.language_id')
            ->orderByDesc('languageCount')  
            ->first();

            return response()->json([
                'favorite_language' => (Language::find($favoriteLanguage->language_id)->name)
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
