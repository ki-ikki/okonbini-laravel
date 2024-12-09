<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth;
use Symfony\Component\HttpFoundation\Response;
use Firebase\Auth\Token\Exception\InvalidToken;

class FirebaseAuthMiddleware
{
    protected $auth;

    public function __construct()
    {
        $this->auth = app('firebase.auth');
    }

    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($token);
            $firebaseUserId = $verifiedIdToken->claims()->get('sub');

            $request->attributes->set('firebase_user_id', $firebaseUserId);
        } catch (InvalidToken $e) {
            return response()->json(['error' => 'Invalid token: ' . $e->getMessage()], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Authentication error: ' . $e->getMessage()], 500);
        }

        return $next($request);
    }
}
