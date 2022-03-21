<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPostRequest;
use App\Http\Requests\ShowPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagResource;
use App\Models\Post;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ApiResponseHelpers;

    public function index(IndexPostRequest $request)
    {
        $data = Post::with(['tags', 'user'])->filter($request->all())->latest()->get();
        $collection = PostResource::collection($data);
        if ($collection->isEmpty()) {
            return $this->respondNotFound('Not found');
        }
        return $this->respondWithSuccess($collection);
    }

    public function store(StorePostRequest $request)
    {
        $this->authorize('create', Post::class);

        $user = $request->user();
        
        $post = $user->posts()->create($request->safe()->only([
            'title',
            'slug',
            'content',
        ]));

        $tags = $request->input('tags');
        if ($tags) {
            $post->attachTags($tags);
        }
        $post->load(['tags','user']);

        return $this->respondCreated(new PostResource($post));
    }

    public function show(Post $post)
    {
        $post->load(['tags','user']);
        return $this->respondWithSuccess(new PostResource($post));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->safe()->only(['title','slug','content']);

        $post->fill($validated);

        if ($request->has('tags')) {
            if ($request->filled('tags')) {
                $post->syncTags($request->input('tags'));
            } else {
                $post->tags()->detach();
            }
        }

        $post->load(['tags','user'])->save();

        return $this->respondWithSuccess(new PostResource($post));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->load(['tags','user'])->delete();

        return $this->respondWithSuccess(new PostResource($post));
    }
}
