<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use HttpResponses;

    public function __construct(
        protected PostService $postService,
    )
    {}

    public function index(Request $request)
    {
        return $this->postService->getAllPosts();
    }

    public function store(StorePostRequest $request)
    {
        $dataValidated = $request->validated();

        return $this->postService->storePost($dataValidated);
    }

    public function show(Request $request, $id)
    {
        return $this->postService->getPost($id);
    }

    public function update(Request $request, Post $post)
    {
        $dataValidated = $request->validate([
            'text' => 'required|max:280|unique:posts',
        ]);

        return $this->postService->updatePost($post->id, $dataValidated);
    }

    public function destroy(Post $post)
    {
        return $this->postService->deletePost($post->id);
    }
    
}
    