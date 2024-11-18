<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $item = Item::with('itemType')->find($id);  // This includes the itemType
            if (!$item) {
                return response()->json(['error' => 'Item not found'], 404);
            }
            return response()->json($item);
        }
    
        $items = Item::with('itemType')->get();  // This includes the itemType for each item
        return response()->json($items);
    }
}
