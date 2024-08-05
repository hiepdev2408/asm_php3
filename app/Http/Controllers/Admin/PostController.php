<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class PostController extends Controller
{
    const PATH_VIEW = 'Backend.post.';
    const PATH_UPLOAD = 'post';
    public function index()
    {
        $data = Post::query()->with(['user', 'category', 'tags'])->latest('id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function create()
    {
        $category = Category::query()->pluck('name', 'id')->all();
        $user = User::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();

        return view(self::PATH_VIEW . __FUNCTION__, compact('category', 'user', 'tags'));
    }

    public function store(Request $request)
    {

        $post = $request->except('tags');
        $post['is_active'] = isset($post['is_active']) ? 1 : 0;
        $post['is_hot'] = isset($post['is_hot']) ? 1 : 0;
        $post['is_show_home'] = isset($post['is_show_home']) ? 1 : 0;
        $post['is_new'] = isset($post['is_new']) ? 1 : 0;
        $post['slug'] = Str::slug($post['name']) . '-' . Str::random(5);
        $tags = $request->tags;
        // dd($request->all());
        try {
            DB::beginTransaction();
            /** @var Post $postInsert */
            if($post['image']){
                $post['image'] = Storage::put(self::PATH_UPLOAD, $post['image']);
            }
            $post['user_id'] = Auth::user()->id;
            $postInsert = Post::query()->create($post);


            $postInsert->tags()->sync($tags);

            DB::commit();
            return redirect()->route('admin.post.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());

            return back();
        }
    }

    public function show(string $id)
    {
        $model = Post::query()->with(['user', 'category', 'tags'])->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    public function edit(string $id){
        $model = Post::query()->with(['user', 'category', 'tags'])->findOrFail($id);
        $category = Category::query()->pluck('name', 'id')->all();
        $user = User::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();

        return view(self::PATH_VIEW . __FUNCTION__, compact('model','category', 'user', 'tags'));
    }

    public function update(Request $request, string $id){
        $post = Post::query()->with('tags')->findOrFail($id);
        $posts = $request->except('tags');
        $posts['is_active'] = isset($posts['is_active']) ? 1 : 0;
        $posts['is_hot'] = isset($posts['is_hot']) ? 1 : 0;
        $posts['is_show_home'] = isset($posts['is_show_home']) ? 1 : 0;
        $posts['is_new'] = isset($posts['is_new']) ? 1 : 0;

        if($request->hasFile('image')){
            $posts['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        /**
         * @var Post $post
         */
        $currentImage = $request->image;
        $post->update($posts);

        if($currentImage && Storage::exists('image')){
            Storage::delete($currentImage);
        }

        $post->tags()->sync($request->tags);

        return back();
    }
}
