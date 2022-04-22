<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index()
    {
        $all_category = Category::where('status','0')->get();
        return view('frontend.index',compact('all_category'));
    }

    public function viewCategoryPost(string $category_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category)
        {
            $post = Post::where('categroy_id',$category->id)->where('status','0')->paginate(5);
            return view('frontend.post.index',compact('post','category'));
        }
        else 
        {
            return redirect('/');
        }
    }

    public function viewPost(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category)
        {
            $post = Post::where('categroy_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();
            $latestPost = Post::where('categroy_id',$category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(5);
            return view('frontend.post.view',compact('post','latestPost'));
        }
        else 
        {
            return redirect('/');
        }
    }
}
