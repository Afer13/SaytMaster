<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    public static function getPosts()
    {
        return Post::latest()->paginate();
    }
    public static function getPost($id)
    {
        return Post::find($id);
    }
    public static function storePost(Request $request): void
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content_short = $request->content_short;
        $post->content = $request->content;
        $post->slug = $request->slug;
        if ($request->hasFile('image')) {
            $post->image_url = $request->file('image')->store('posts', 'public');
        }
        $post->save();
    }

    public static function updatePost(Request $request, $id): void
    {
        $post = PostService::getPost($id);
        if ($post) {
            $post->title = $request->title;
            $post->content_short = $request->content_short;
            $post->content = $request->content;
            $post->slug = $request->slug;
            if ($request->hasFile('image')) {
                $post->image_url = $request->file('image')->store('posts', 'public');
            }
            $post->save();
        }
    }

    public static function destroyPost($id): void
    {
        $post = PostService::getPost($id);
        if ($post) {
            $post->delete();
        }
    }

    public static function activeStatusChange($id): void{
        $post=PostService::getPost($id);
        if($post){
            $post->is_active=!$post->is_active;
            $post->save();
        }
    }
}
