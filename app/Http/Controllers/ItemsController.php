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
        $group = Group::find($id);
        $items = \DB::table('items')->where('items.group_id', $group->id)->orderBy('status', 'desc')->orderBy('created_at', 'desc')->paginate(20);
        $groupusers= $group->users()->get();
        
        return view('items.index', [
            'items' => $items,
            'group' => $group,
            'groupusers' => $groupusers->take(4),
        ]);
    }
    
    public function lend($id)
    {
        $item = new Item;
        $group = Group::find($id);
        $posts = \DB::table('posts')->where('posts.group_id', $group->id)->distinct()->paginate(20);
        $groupusers = $group->users()->get();
        
        return view('items.create',[
            'item' => $item, 
            'group' => $group, 
            'posts' => $posts,
            'groupusers' => $groupusers->take(4),
            ]);
    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'name' => 'required',
            'group_id'=> 'required',

        ]);
        
        \Crew\Unsplash\HttpClient::init([
            'applicationId'	=> env('UNSPLASH_KEY'),
            'secret' => env('UNSPLASH_SECRET'),
            'callbackUrl' => 'https://your-application.com/oauth/callback',
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
            $photo = $photos[0]['urls']['small'];
        } else {
            $photo = $photos[0]['urls']['small'];
        }
        
        $tmp = \Crew\Unsplash\Photo::find($photos[0]['id']);
        $tmp->download();
        
        $request->user()->items()->create([
            'content' => $request->content,
            'status' => "open",
            'name' => $request->name,
            'reward' => $request->reward,
            'photo' => $photo,
            'photo_link' => $photos[0]['links']['html'],
            'photo_username' => $photos[0]['user']['username'],
            'photo_fullname' => $photos[0]['user']['name'],
            'group_id' => $request->group_id,
        ]);
        
        return redirect(route('items.index', $request->group_id));
    }
    
    public function show($id)
    {
      $item = Item::find($id);
      $comments = $item->comments();
      $user = User::find($item->user_id);
        
        return view('items.show',[
            'item' => $item, 
            'comments' => $comments,
            'user' => $user,
        
        ]);
    }
    
     public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit', ['item' => $item]); 
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'content' => 'required|max:191',
            'name' => 'required',
            
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
        
        $tmp = \Crew\Unsplash\Photo::find($photos[0]['id']);
        $tmp->download();

        $item = Item::find($id);
        $item->name = $request->name;
        $item->content = $request->content;
        $item->reward = $request->reward;
        $item->status = $request->status;
        $item->photo = $photo;
        $item->photo_link = $photos[0]['links']['html'];
        $item->photo_username = $photos[0]['user']['username'];
        $item->photo_fullname = $photos[0]['user']['name'];
        $item->save();
        $group = Group::find(1);
        return view('items.show', ['item' => $item, 'group' => $group,]); 
    }
    
    public function destroy($id)
    {
        $item = Item::find($id);
        $group_id = $item->group_id;
        $item->delete();
        return redirect(route('items.index', $group_id));
    }
}
