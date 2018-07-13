<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\Group;

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
      $items = $items->orderBy('created_at','desc')->paginate(20);
    
      //->paginate(100);
      return view('results.index')->with('items',$items)
      ->with('keyword',$keyword)
      ->with('message','Results');
    }
    
     public function groupsearch(Request $request)
    {
    
      #キーワード受け取り
      $keyword = $request->input('keyword');
      
      $groups = \DB::table('groups');
     
      #もしキーワードがあったら
      if(!empty($keyword))
      {
        $groups->where('name','LIKE','%'.$keyword.'%');
      }
     
      #ページネーション
      $groups = $groups->orderBy('created_at','desc')->paginate(20);
    
      //->paginate(100);
      return view('results.groupindex')->with('groups',$groups)
      ->with('keyword',$keyword)
      ->with('message','Results');
    }
}
