<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function create(): View
    {
        $categories = Category::where('status',1)->get();
        return view('item.form', compact('categories'));
    }

    public function store(Request $request)
    {
//       Data Validation
        $request->validate([
            'category_id' => 'required',
            'item_name' => 'required',
            'status' => 'required'
        ]);
        //  Data Insert
        $item = new Item();
        $item->category_id = $request->category_id;
        $item->item_name = $request->item_name;
        $item->status = $request->status;
        $item->save();
//        Response Return with Flash Message
        return redirect()->back()->with('FlsMsg', 'Item created');
    }
}
