<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class ApiKeyAuth
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->query('api_key') ?? $request->header('X-Api-Key');

        if (!$apiKey) {
            return response()->json(['message' => 'API key missing'], 401);
        }

        $user = User::where('api_key', $apiKey)->first();

        if (! $user) {
            return response()->json(['message' => 'Invalid API key'], 401);
        }

        auth()->login($user); // simulate login

        return $next($request);
    }
}
