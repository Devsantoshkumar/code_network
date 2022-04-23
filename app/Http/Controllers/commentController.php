<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class commentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check()){

            $validator = Validator::make($request->all(), [
                  'comment' => 'required|string' 
            ]);

            if($validator->fails())
            {
                return redirect()->back()->with('massage','Comment area is mendatory');
            }

            $post = Post::where('slug',$request->post_slug)->where('status','0')->first();
            if($post)
            {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => auth()->user()->id,
                    'comment_body' => $request->comment
                ]);
              return redirect()->back()->with('massage','Commented successfully');
            }else
            {
              return redirect()->back()->with('massage','No such post found');
            }
        }
        else
        {
           return redirect('login')->with('massage','Login first to comment');
        }
    }

    public function delete(Request $request)
    {
        if(Auth::check())
        {
            $comment = Comment::where('id',$request->comment_id)->where('user_id', Auth::user()->id)->first();
            
            if($comment){
                $comment->delete();

                return response()->json([
                    'status' => 200,
                    'message' => 'Deleted successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ]);
            }

        }
        else
        {
            return response()->json([
                'status' => 401,
                'message' => 'Login to Delete this comment'
            ]);
        }
    }
   
}
