<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        // TODO: Firebase 認証確認用で簡易実装。修正必要
        $userId = $request->attributes->get('firebase_user_id');
        return response()->json([
            'message' => 'Authenticated user',
            'user_id' => $userId,
            'items' => User::all(),
        ]);
    }
}
