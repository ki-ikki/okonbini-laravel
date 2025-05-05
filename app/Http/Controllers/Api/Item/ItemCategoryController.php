<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'message' => 'Authenticated user',
            'items' => ItemCategory::all(),
        ]);
    }
}
