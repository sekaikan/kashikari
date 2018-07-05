<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemsController extends Controller
{
    public function index()
    {
         $items = Item::all();
        
        return view('items.index', [
            'items' => $items,
        ]);
    }
    
    public function create()
    {
        $item = new Item;
        
        return view('items.items', ['item' => $item,]);
    }
    
     public function store()
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'name' => 'required',
            'reward' => 'required',
            'status' => 'required|max:10',
        ]);
        
        $request->user()->items()->create([
            'content' => $request->content,
            'status' => $request->status,
            'name' => $request->name,
            'reward' => $request->reward,
            'photo' => $request->photo,
        ]);
        
         return redirect() ->back();
    }
    
     public function show($id)
    {
      $item = Item::find($id);
        
        return view('items.show', ['item' => $item, ]);
    }
    
     public function edit()
    {
        $item = Item::find($id);
        
        return view('items.show', ['item' => $item, ]); 
    }
    
     public function update()
    {
        $this->validate($request, [
           'content' => 'required|max:191',
            'name' => 'required',
            'reward' => 'required',
            'status' => 'required|max:10',
        ]);
        
        $item = Item::find($id);
        $item->name = $request->name;
        $item->content = $request->content;
        $item->reward = $request->reward;
        $item->status = $request->status;
        $item->photo = $request->photo;
        $item->save();
         return view('items.show', ['item' => $item, ]); 
    }
    
     public function destroy()
    {
        $item = Item::find($id);
        $item -> delete();
        
         return view('items.items', ['item' => $item, ]); 
    }
}
