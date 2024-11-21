<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Post::with('category')->where('post_status', 1)->where('post_type', 1)->latest()->take(5)->get();
        $featured = Post::with('category')->where('post_status', 1)->where('post_type', 2)->latest()->take(6)->get();
        $latest = Post::with('category')->latest()->take(10)->get();
        $last = Post::with('category')->orderBy('created_at', 'asc')->take(5)->get();

        return view('homePage.home.index', compact('slider', 'featured', 'latest', 'last'));
    }

    public function post(Post $blog)
    {
        $blog = Post::find($blog->id);

        $recent_posts = Post::latest()->take(3)->get();
        $categories = Category::latest()->withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        // $tags = Tag::latest()->take(15)->get();
        $person = Admin::find(1);

        return view('homePage.blog.single', [
            'post' => $blog,
            'recent_posts' => $recent_posts,
            'cates' => $categories,
            // 'tags' => $tags,
            'person' => $person
        ]);
    }

    public function blogs()
    {
        $blogs = Post::with('image')->latest()->paginate(10);

        $recent_posts = Post::latest()->take(5)->get();
        $categories = Category::latest()->withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        // $tags = Tag::latest()->take(15)->get();

        return view('frontEnd.blog.blogs', [
            'blogs' => $blogs,
            'recent_posts' => $recent_posts,
            'cates' => $categories,
            // 'tags' => $tags,
        ]);
    }

    public function category(Category $category)
    {
        $recent_posts = Post::latest()->take(5)->get();
        $cates = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        // $tags = Tag::latest()->take(50)->get();

        return view('homePage.category.category', [
            'category' => $category,
            'blogs' => $category->posts()->paginate(12),
            'recent_posts' => $recent_posts,
            'cates' => $cates,
            // 'tags' => $tags,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $blogs = Post::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('body', 'like', '%' . $request->search . '%')
            ->paginate(9);

        return view('homePage.search.search', compact('blogs', 'search'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('homePage.page.index', compact('page'));
    }
}
