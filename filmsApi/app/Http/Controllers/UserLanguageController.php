<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Critic;

class UserLanguageController extends Controller
{
    public function favoriteLanguage(string $user_id)
    {
        $user = User::findOrFail($user_id);
        $preferedLanguage = $user->critics
        return $user->critic
    }
}
