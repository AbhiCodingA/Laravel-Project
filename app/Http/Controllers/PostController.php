<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showBlog(Post $blog)
    {

        $blog = Post::with('author')->withCount('comments')->find($blog->id);

        $recent_posts = Post::latest()->withCount('comments')->take(5)->get();

        $categories = Category::latest()->withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        // $tags = Tag::latest()->take(15)->get();
        $person = Admin::find(1);

        return view('frontEnd.blog.details', [
            'post' => $blog,
            'recent_posts' => $recent_posts,
            'cates' => $categories,
            // 'tags' => $tags,
            'person' => $person,
        ]);
    }

}
