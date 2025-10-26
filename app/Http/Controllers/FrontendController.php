<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class FrontendController extends Controller
{
    public function index(){
        // $categories = Category::all();
        $categories = Category::latest()->take(6)->get();
        $items = Item::with("category")->latest()->take(10)->get();
        return view("frontend.index", compact('categories', 'items'));
    }

    public function filterByCategory($id = 'all'){
        if ($id === 'all') {
            // $items = Item::all();
            $items = Item::latest()->take(10)->get();
        } else {
            // $items = Item::where('category_id', $id)->get();
            $items = Item::where('category_id', $id)->latest()->take(10)->get();
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
