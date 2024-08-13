<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        $items = Item::with('parts')->orderBy('position')->get();

        return response()->json([
            'items' => $items
        ]);
    }

    public function moveUp(Request $request) {
        $item = Item::find($request->id);
        $aboveItem = Item::where('position', '<', $item->position)
            ->orderBy('position', 'DESC')
            ->first();

        if ($aboveItem) {
            $currentPosition = $item->position;
            $item->position = $aboveItem->position;
            $aboveItem->position = $currentPosition;

            $item->save();
            $aboveItem->save();
        }

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function moveDown(Request $request) {
        $item = Item::find($request->id);
        $belowItem = Item::where('position', '>', $item->position)
            ->orderBy('position', 'ASC')
            ->first();

        if ($belowItem) {
            $currentPosition = $item->position;
            $item->position = $belowItem->position;
            $belowItem->position = $currentPosition;

            $item->save();
            $belowItem->save();
        }

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function destroy($id)
    {
        Item::destroy($id);
        return response()->noContent();
    }
}
