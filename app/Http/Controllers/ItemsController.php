<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\Post;

use App\User;

use App\Group;

class ItemsController extends Controller
{
    public function index($id)
    {
        $items = Item::orderBy('updated_at', 'desc')->paginate(20);
        $group = Group::find($id);
        
        foreach ($items as $item) {
            $date = date_create($item->date);
            $date = date_format($date , 'Y-m-d');
            $item->date = $date;  //取得したtimestampのデータを、Y-m-dに変換
        }
        
        return view('items.index', [
            'items' => $items,
            'group' => $group,
        ]);
    }
    
    public function lend($id)
    {
        $item = new Item;
        $group = Group::find($id);
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
        
        return view('items.create', ['item' => $item, 'group' => $group, 'posts' =>$posts]);
    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'name' => 'required',
            'reward' => 'required',
            'status' => 'required|max:10',
        ]);
        
        \Crew\Unsplash\HttpClient::init([
            'applicationId'	=> env('UNSPLASH_KEY'),
            'secret' => env('UNSPLASH_SECRET'),
            'callbackUrl'	=> 'https://your-application.com/oauth/callback',
            'utmSource' => 'kashikari'
        ]);
        
        $scopes = ['public'];
        \Crew\Unsplash\HttpClient::$connection->getConnectionUrl($scopes);
        $search = $request->name;
        $orientation = 'landscape';
        $photos = \Crew\Unsplash\Search::photos($search, $orientation);
        if (isset($photos[0]['urls']['small'])==FALSE) {
            $search = 'gift';
            $orientation = 'landscape';
            $photos = \Crew\Unsplash\Search::photos($search, $orientation);
            $photo = $photo = $photos[0]['urls']['small'];
        } else {
            $photo = $photos[0]['urls']['small'];
        }
        
        $request->user()->items()->create([
            'content' => $request->content,
            'status' => $request->status,
            'name' => $request->name,
            'reward' => $request->reward,
            'photo' => $photo,
        ]);
        
          return redirect('/items');
    }
    
    public function show($id)
    {
      $item = Item::find($id);
      $comments = $item->comments();
      $group = Group::find(1);
      
        
        return view('items.show',[
            'item' => $item, 
            'comments' => $comments,
            'group' => $group,
        
        ]);
    }
    
     public function edit($id)
    {
        $item = Item::find($id);
         $group = Group::find(1);
        return view('items.edit', ['item' => $item, 'group' => $group,]); 
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'content' => 'required|max:191',
            'name' => 'required',
            'reward' => 'required',
            'status' => 'required|max:10',
        ]);
        
        \Crew\Unsplash\HttpClient::init([
            'applicationId'	=> env('UNSPLASH_KEY'),
            'secret' => env('UNSPLASH_SECRET'),
            'callbackUrl'	=> 'https://your-application.com/oauth/callback',
            'utmSource' => 'kashikari'
        ]);
        
        $scopes = ['public'];
        \Crew\Unsplash\HttpClient::$connection->getConnectionUrl($scopes);
        $search = $request->name;
        $orientation = 'landscape';
        $photos = \Crew\Unsplash\Search::photos($search, $orientation);

        $item = Item::find($id);
        $item->name = $request->name;
        $item->content = $request->content;
        $item->reward = $request->reward;
        $item->status = $request->status;
        $item->photo = $photos[0]['urls']['small'];
        $item->save();
        $group = Group::find(1);
        return view('items.show', ['item' => $item, 'group' => $group,]); 
    }
    
    public function destroy($id)
    {
        $item = Item::find($id);
        $item -> delete();
        
    return redirect('/items');
    }
    
    

}
