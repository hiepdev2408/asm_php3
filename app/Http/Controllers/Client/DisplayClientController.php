<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class DisplayClientController extends Controller
{
    public function index()
    {
        $data = Post::query()->with(['tags', 'category', 'user'])->latest('id')->get();

        $hot = $data->where('is_hot', '1')->first();
        $showHome = $data->where('is_show_home', true)->take(3)->all();
        $showAll = $data->all();

        $new = $data->where('is_new', '1')->first();
        $tags = Tag::query()->pluck('name', 'id')->all();

        $categories = Category::query()->pluck('name', 'id')->all();

        return view('Fontend.dashboard', compact('data', 'tags', 'categories', 'hot', 'showHome', 'new', 'showAll'));
    }
    public function detail_new($id){
        $posts = Post::query()->with('tags')->findOrFail($id);
        $categories = Category::query()->pluck('name', 'id')->all();

        return view('Fontend.posts.post_detail', compact('posts', 'categories'));   
    }

    public function loadAllPost(){
        $data = Post::query()->latest('id')->paginate(5);

        return view('Fontend.posts.listpost', compact('data'));
    }

    public function search($id){
        $category = Category::findOrFail($id);
        // $data = Post::query()->latest('id')->paginate(5);
        $categories = Category::query()->pluck('name', 'id')->all();
        $search_categories = $category->posts()->with('tags', 'user')->get();


        return view('Fontend.posts.search ', compact('search_categories', 'categories'));
    }
}
