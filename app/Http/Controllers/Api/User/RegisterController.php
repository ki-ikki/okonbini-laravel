<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAuth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // リクエストの内容をログに出力（デバッグ用）
        \Log::info('Register request received', ['data' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'password' => 'required|string',
            'unique_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed', 'details' => $validator->errors()], 400);
        }

        $userName = $request->input('user_name');
        $dateOfBirth = $request->input('date_of_birth');
        $email = $request->input('email');
        $password = $request->input('password');
        $uniqueId = $request->input('unique_id');

        try {
            $user = User::create($userName, $dateOfBirth);
            UserAuth::create($user, $email, $password, $uniqueId);

            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            \Log::error('User registration failed', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'User registered failed'], 400);
        }
    }
}
