<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, $post_id)
    {

        $like = Like::where('user_id', '=', auth()->user()->id)->where('post_id', '=', $post_id);
        
        if ($request->has('like')) 
        {       
            if($like->exists() === false)
            {
                Like::create([
                    'post_id' => $post_id,
                    'user_id' => auth()->user()->id,
                    'like' => 1
                ]);

                Post::where('id',$post_id)->increment('likes');
                Post::where('id',$post_id)->update(['dislikes' => Post::raw('GREATEST(dislikes - 1, 0)')]);
            }
            else if ($like->value('like') == 0)
            {
                Like::where('user_id',auth()->user()->id)
                    ->where('post_id',$post_id)
                    ->update(['like'=>1]);
                Post::where('id',$post_id)->increment('likes');
                Post::where('id',$post_id)->update(['dislikes' => Post::raw('GREATEST(dislikes - 1, 0)')]);

            }
            else
            {
                redirect()->back()->withErrors("You already like the post");
            }

        }
        else
        {    
            if($like->exists() === false)
            {
                Like::create([
                    'post_id' => $post_id,
                    'user_id' => auth()->user()->id,
                    'like' => 0
                ]);
                Post::where('id',$post_id)->increment('dislikes');
                Post::where('id',$post_id)->update(['likes' => Post::raw('GREATEST(likes - 1, 0)')]);

            }
            else if ($like->value('like') == 1)
            {
                Like::where('user_id',auth()->user()->id)
                    ->where('post_id',$post_id)
                    ->update(['like'=>0]);
                
                Post::where('id',$post_id)->increment('dislikes');
                Post::where('id',$post_id)->update(['likes' => Post::raw('GREATEST(likes - 1, 0)')]);


            }
            else
            {
                redirect()->back()->withErrors("You already dislike the post");
            }
        }
      
        return redirect()->back();
    }


}
