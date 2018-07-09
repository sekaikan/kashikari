<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ResultsController extends Controller
{
    public function index(Request $request)
    {
      #キーワード受け取り
      $keyword = $request->input('keyword');
     
      $items = \DB::table('items');
     
      #もしキーワードがあったら
      if(!empty($keyword))
      {
        $items->where('name','LIKE','%'.$keyword.'%')->orWhere('content','LIKE','%'.$keyword.'%');
      }
     
      #ページネーション
      $items = $items->orderBy('created_at','desc')->get();
    
      //->paginate(100);
      return view('results.index')->with('items',$items)
      ->with('keyword',$keyword)
      ->with('message','Results');
    }
}
