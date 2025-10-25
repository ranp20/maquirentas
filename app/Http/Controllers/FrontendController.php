<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $items = Item::with("category")->get();
        return view("frontend.index", compact('categories', 'items'));
    }

    public function filterByCategory($id = 'all'){
        if ($id === 'all') {
            $items = Item::all();
        } else {
            $items = Item::where('category_id', $id)->get();
        }
        // $items['routedetail'] = route('item.show', $items->id);
        $items->each(function ($item) {
            $item->routedetail = route('item.show', $item->id);
        });

        return response()->json($items);
    }

    public function getItemDetail($id){
        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    public function showDetailPage($id){
        $item = Item::with('category')->findOrFail($id);
        $title = $item->brand . $item->year;
        return view('frontend.product-detail', compact('item', 'title'));
    }
}
