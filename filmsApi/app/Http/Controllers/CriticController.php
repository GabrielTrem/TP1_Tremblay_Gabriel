<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Critic;

class CriticController extends Controller
{
    public function destroy(string $id)
    {
        try {
            $critic = Critic::findOrFail($id);
            $critic->delete();
            return response()->noContent();
        } catch (Exception $e) {
            abort(NOT_FOUND, 'Not Found');
        }
    }
}
