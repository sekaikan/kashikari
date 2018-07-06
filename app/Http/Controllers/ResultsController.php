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
     
      #クエリ生成
      $query = Item::query();
     
      #もしキーワードがあったら
      if(!empty($keyword))
      {
        $query->where('name','like','%'.$keyword.'%')->orWhere('content','like','%'.$keyword.'%');
      }
     
      #ページネーション
      $data = $query->orderBy('created_at','desc')->paginate(100);
      return view('results.index')->with('data',$data)
      ->with('keyword',$keyword)
      ->with('message','Results');
    }
}
