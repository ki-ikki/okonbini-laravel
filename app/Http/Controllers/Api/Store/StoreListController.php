<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreListController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'message' => 'Authenticated user',
            'items' => Store::all(),
        ]);
    }
}
